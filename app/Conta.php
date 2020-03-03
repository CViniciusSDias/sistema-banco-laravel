<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * @property-read int id
 * @property string $nome_titular
 * @property string $cpf_titular
 * @property float $saldo
 * @property Collection $transferenciasRecebidas
 * @property Collection $transferenciasFeitas
 */
class Conta extends Model
{
    protected $fillable = [
        'nome_titular',
        'cpf_titular'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->saldo = 0;
    }

    public function transferenciasFeitas()
    {
        return $this->hasMany(Transferencia::class, 'conta_origem');
    }

    public function transferenciasRecebidas()
    {
        return $this->hasMany(Transferencia::class, 'conta_destino');
    }

    public function transfere(float $valor, Conta $contaDestino)
    {
        DB::transaction(function () use ($contaDestino, $valor) {
            $transferencia = new Transferencia();
            $transferencia->origem()->associate($this);
            $transferencia->destino()->associate($contaDestino);
            $transferencia->valor = $valor;

            $this->saldo -= $valor;
            $contaDestino->saldo += $valor;

            $this->save();
            $contaDestino->save();
            $transferencia->save();
        });
    }
}
