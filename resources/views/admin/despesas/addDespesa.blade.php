@extends('adminlte::page')

@section('title', 'Cadastrar Despesa')

@section('content_header')
    <h1>Add Despesa</h1>

    <ol class='breadcrumb'>
        <li><a><i class="fa fa-dashboard"></i>DashBoard</a></li>
        
        <li><a><i class="fa fa-inbox-in"></i> Add Despesa</a></li>
    </ol>
@stop

@section('content')
<div class = "box">
        <div class="box-header">
            <h3>Adcionar Despesa</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.messages')

            <form method="POST" action="{{ route('admin.storeDespesa') }}">
            {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="descricao" class="form-control" placeholder="Descreva brevemente a despesa"/>
                </div>
                <div class="form-group">
                    <input type="number" name="valor" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="date" name="data" class="form-control"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>

    </div>
@stop