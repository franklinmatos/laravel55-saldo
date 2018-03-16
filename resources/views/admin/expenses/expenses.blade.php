@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class='breadcrumb'>
        <li><a><i class="fa fa-dashboard"></i>DashBoard</a></li>
        <li><a><i class="fa fa-credit-card-alt"></i>Despesas</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
        <div class="box-header">
            <a href="{{route('balance.deposit')}}" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Cadastrar</a>
        </div>
        <div class="box-body">
            @include('admin.includes.messages')
            
        </div>

    </div>
@stop