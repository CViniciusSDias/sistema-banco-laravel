<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Transferencia;
use Illuminate\Http\Request;

class TransferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(int $conta)
    {
        $contas = Conta::query()->whereKeyNot($conta)->get();

        return view('transferencia.create', compact('conta', 'contas'));
    }

    public function store(Conta $conta, Request $request)
    {
        $conta->transfere($request->valor, Conta::find($request->destino));

        return redirect()->route('conta.show', ['conta' => $conta]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function show(Transferencia $transferencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Transferencia $transferencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transferencia $transferencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transferencia $transferencia)
    {
        //
    }
}
