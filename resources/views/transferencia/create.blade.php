@extends('layout')

@section('css')
    <style>
        .mdl-textfield {
            display: block;
            width: 50%;
        }
    </style>
@endsection

@section('body')
    <div class="mdl-card mdl-shadow--2dp" id="card-extrato">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Realizar transferência</h2>
        </div>

        <form action="{{ route('transferencia.store', ['conta' => $conta]) }}" method="post">
            @csrf
            <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="destino" name="destino">
                        <option></option>
                        @foreach($contas as $conta)
                        <option value="{{ $conta->id }}">{{ $conta->nome_titular }}</option>
                        @endforeach
                    </select>
                    <label class="mdl-textfield__label" for="destino">Conta de destino</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="number" step="0.1" id="valor" name="valor">
                    <label class="mdl-textfield__label" for="valor">Valor</label>
                    <span class="mdl-textfield__error">Digite um número!</span>
                </div>
            </div>

            <div class="mdl-card__actions">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                    Transferir
                </button>
            </div>
        </form>
    </div>
@endsection
