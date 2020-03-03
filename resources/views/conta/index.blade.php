@extends('layout')

@section('css')
    <style>
        .mdl-card__actions {
            display: flex;
            justify-content: flex-end;
        }

            .mdl-card__actions a {
                margin: 0;
                background: #009688;
                color: white;
            }

            .mdl-card__actions a.mdl-button:hover {
                background: #008B7D;
            }
        h4 {
            text-align: right;
        }
    </style>
@endsection

@section('body')
<div class="mdl-card mdl-shadow--2dp" id="card-extrato">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Extrato de {{ $conta->nome_titular }}</h2>
    </div>
    <div class="mdl-card__supporting-text">
        <h4>Saldo: R$ {{ number_format($conta->saldo, 2, ',', '.') }}</h4>
        <ul class="mdl-list">
            @foreach($transferencias as $transferencia)
            <li class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                    @if ($transferencia->origem->id == $conta->id)
                        <i class="material-icons mdl-list__item-icon" style="color: red">remove</i>
                        Para {{ $transferencia->destino->nome_titular }}
                    @else
                        <i class="material-icons mdl-list__item-icon" style="color: green">add</i>
                        De {{ $transferencia->origem->nome_titular }}
                    @endif
                </span>
                <span class="mdl-list__item-secondary-action">
                    R$ {{ number_format($transferencia->valor, 2, ',', '.') }}
                </span>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="mdl-card__actions">
        <a href="{{ route('transferencia.create', ['conta' => $conta->id]) }}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect">
            <i class="material-icons">add</i>
        </a>
    </div>
</div>
@endsection
