<?php

namespace App\Http\Controllers;

use App\Conta;

class ContasController extends Controller
{
    public function show(Conta $conta)
    {
        $transferencias = $conta->transferenciasFeitas
            ->merge($conta->transferenciasRecebidas)
            ->sort(fn ($a, $b) => $a->created_at->gt($b->created_at) ? -1 : 1);

        return view('conta.index', ['transferencias' => $transferencias, 'conta' => $conta]);
    }
}
