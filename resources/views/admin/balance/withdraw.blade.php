@extends('adminlte::page')

@section('title', 'Nova Recarga')

@section('content_header')
    <h1>Fazer Retirada</h1>

    <ol class='breadcrumb'>
        <li><a><i class="fa fa-dashboard"></i>DashBoard</a></li>
        <li><a><i class="fa fa-credit-card-alt"></i>Saldo</a></li>
        <li><a><i class="fa fa-cart-arrow-down"></i> Retirada</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
        <div class="box-header">
            <h3>Fazer Retirada</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.messages')

            <form method="POST" action="{{ route('withdraw.store') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="value" class="form-control" placeholder="Valor Saque"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sacar</button>
                </div>
            </form>
        </div>

    </div>
@stop