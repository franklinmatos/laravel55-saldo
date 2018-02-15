@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class='breadcrumb'>
        <li><a>DashBoard</a></li>
        <li><a>Saldo</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
        <div class="box-header">
            <a href="" class="btn btn-primary"><i class="fas fa-cart-plus"></i>Recarregar</a>
            <a href="" class="btn btn-danger"><i class="fas fa-cart-arrow-down"></i> Sacar</a>
        </div>
        <div class="box-body">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>R$ 90,00</h3>

                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">Histórico<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@stop