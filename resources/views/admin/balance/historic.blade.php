@extends('adminlte::page')

@section('title', 'Registro de Histórico de Transações')

@section('content_header')
    <h1>Histórico de Transações</h1>

    <ol class='breadcrumb'>
        <li><a><i class="fa fa-dashboard"></i>DashBoard</a></li>
        <li><a><i class="fa fa-credit-card-alt"></i>Saldo</a></li>
        <li><a><i class="fa fa-history"></i> Histórico de Transações</a></li>
    </ol>
@stop

@section('content')
    <div class = "box">
        <div class="box-header">
            <h3>Histórico de Transações </h3>
        </div>
        <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th width="5%">#</th>
            <th width="10%">Data</th>
            <th width="10%">Valor(R$)</th>
            <th width="20%">Tipo</th>
            <th width="55%">Destinatário</th>
          </tr>
            @forelse($historics as $historic)
                <tr>
                    <th>{{$historic->id}}</th>
                    <th>{{$historic->date}}</th>
                    <th>{{number_format($historic->amount,2,',','')}}</th>
                    <th>{{$historic->type($historic->type)}}</th>
                    <th>
                        @if($historic->user_id_transaction)
                                {{$historic->userEnv->name}}
                            @else
                                    -
                        @endif
                    </th>
                </tr>

            @empty
            @endforelse


        </table>
        {!! $historics->links() !!}
      </div>

    </div>
@stop