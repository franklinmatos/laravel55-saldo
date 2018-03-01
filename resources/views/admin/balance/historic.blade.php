@extends('adminlte::page')

@section('title', 'Registro de Histórico de Transações')

@section('content_header')
    <h1>Histórico de Transações</h1>

    <ol class='breadcrumb'>
        <li><a>DashBoard</a></li>
        <li><a>Saldo</a></li>
        <li><a>Transtórico de Transaçõesferir</a></li>
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
            <th style="width: 10px">#</th>
            <th>Task</th>
            <th>Progress</th>
            <th style="width: 40px">Label</th>
          </tr>
          <tr>
            <td>1.</td>
            <td>Update software</td>
            <td>
              <div class="progress progress-xs">
                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
              </div>
            </td>
            <td><span class="badge bg-red">55%</span></td>
          </tr>

        </table>
      </div>

    </div>
@stop