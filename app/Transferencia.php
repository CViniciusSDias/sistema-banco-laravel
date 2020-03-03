<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $valor
 */
class Transferencia extends Model
{
    public function origem()
    {
        return $this->belongsTo(Conta::class, 'conta_origem');
    }

    public function destino()
    {
        return $this->belongsTo(Conta::class, 'conta_destino');
    }
}
