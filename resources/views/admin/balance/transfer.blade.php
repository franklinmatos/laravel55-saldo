@extends('adminlte::page')

@section('title', 'Nova Transferência')

@section('content_header')
    <h1>Transferir</h1>

    <ol class='breadcrumb'>
        <li><a>DashBoard</a></li>
        <li><a>Saldo</a></li>
        <li><a>Transferir</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
        <div class="box-header">
            <h3>Transferir </h3><h6>(Informe o E-mail do destinatário)</h6>
        </div>
        <div class="box-body">
            @include('admin.includes.messages')


            <form method="POST" action="{{ route('confirm.transfer') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Informe o e-mail do destinarário."/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Próximo Passo</button>
                </div>
            </form>
        </div>

    </div>
@stop