@extends('adminlte::page')

@section('title', 'Confirmar Transferência Saldo')

@section('content_header')
    <h1>Transferir</h1>

    <ol class='breadcrumb'>
        <li><a>DashBoard</a></li>
        <li><a>Saldo</a></li>
        <li><a>Transferir</a></li>
        <li><a>Confirmar Transferência</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
    <div class="box-header">
        <h3>Confirmar Transferência Saldo </h3>
    </div>
        <div class="box-body">
            @include('admin.includes.messages')
            <p><strong>Seu saldo atual:</strong>&nbsp;R$&nbsp;{{number_format($balance->amount, 2, '.','')}}</p>
            <p><strong>Recebedor:&nbsp;</strong> {{$email->name}}</p>
            <form method="POST" action="{{ route('transfer.store') }}">
                {!! csrf_field() !!}
                <input type="hidden" name="email_id" value="{{$email->id}}" />
                <div class="form-group">
                    <input type="text" name="value" class="form-control" placeholder="Valor:"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form>
        </div>

    </div>
@stop