@extends('adminlte::page')

@section('title', 'Despesas')

@section('content_header')
    <h1>Despesas</h1>

    <ol class='breadcrumb'>
        <li><a><i class="fa fa-dashboard"></i>DashBoard</a></li>
        <li><a><i class="fa fa-inbox"></i>Despesas</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
        <div class="box-header">
            <a href="{{route('admin.addDespesa')}}" class="btn btn-primary"><i class="fa fa-inbox"></i> Cadastrar</a>
        </div>
        <div class="box-body">
            @include('admin.includes.messages')
        
            <table class="table table-bordered">
            <tr>
                <th style="text-align: center" width="5%">#</th>
                <th style="text-align: center" width="10%">Data</th>
                <th style="text-align: center" width="10%">Valor(R$)</th>
                <th style="text-align: left" width="60%">Descrição</th>
                <th style="text-align: left" width="15%">Operações</th>
            </tr>
            
                @forelse($despesas as $despesa)
            <tr>
                <th style="text-align: center">{{$despesa->id}}</th>
                <th style="text-align: center">{{$despesa->data}}</th>
                <th style="text-align: center">{{number_format($despesa->valor,2,',','')}}</th>
                <th style="text-align: left">{{$despesa->descricao}}</th>
                
            </tr>         
                @empty
                @endforelse
            </table>
            @if(isset($dataFrom))
        {!! $despesas->appends($dataFrom)->links() !!}
        @else
            {!! $despesas->links() !!}
        @endif
        </div>
    </div>

         
@stop