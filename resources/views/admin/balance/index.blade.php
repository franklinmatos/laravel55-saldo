@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class='breadcrumb'>
        <li><a><i class="fa fa-dashboard"></i>DashBoard</a></li>
        <li><a><i class="fa fa-credit-card-alt"></i>Saldo</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
        <div class="box-header">
            <a href="{{route('balance.deposit')}}" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Recarregar</a>
           @if($amount > 0)
                <a href="{{route('balance.withdraw')}}" class="btn btn-danger"><i class="fa fa-cart-arrow-down"></i> Sacar</a>
            @endif
            @if($amount  > 0)
                <a href="{{route('balance.transfer')}}" class="btn btn-info">
                    <i class="fa fa-exchange"></i>
                    Transferir
                </a>
            @endif

        </div>
        <div class="box-body">
            @include('admin.includes.messages')
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>R$ {{ number_format($amount,2,',','')}}</h3>

                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="{{route('admin.historic')}}" class="small-box-footer">Histórico<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@stop