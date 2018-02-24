@extends('adminlte::page')

@section('title', 'Nova Recarga')

@section('content_header')
    <h1>Fazer Recarga</h1>

    <ol class='breadcrumb'>
        <li><a>DashBoard</a></li>
        <li><a>Saldo</a></li>
        <li><a>Depositar</a></li>
    </ol>
@stop

@section('content')
<div class = "box">
        <div class="box-header">
            <h3>Fazer Recarga</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.messages')

            <form method="POST" action="{{ route('deposit.store') }}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="value" class="form-control" placeholder="Valor Recarga"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Recarregar</button>
                </div>
            </form>
        </div>

    </div>
@stop