@extends('site.layouts.app')

@section('title','Meu Perfil')

@section('content')

<h1>Meu Perfil</h1>

@include('admin.includes.messages')
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
 {!! csrf_field() !!}
                <div class="form-group">
                <label for="name">Nome:</label>
                    <input type="text" value="{{ auth()->user()->name}}" name="name" class="form-control" placeholder="Nome"/>
                </div>
                <div class="form-group">
                <label for="mail">E-mail:</label>
                    <input type="text" readonly="readonly" value="{{ auth()->user()->email}}" name="email" class="form-control" placeholder="E-mail"/>
                </div>
                <div class="form-group">
                <label for="password">Senha:</label>
                    <input type="password" name="password" class="form-control" placeholder="Senha"/>
                </div>
                <div class="form-group">
                @if(auth()->user()->image != null)
                <img  src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->name }}" height="56" width="76" />
                @endif
                    <label for="image">Imagem:</label>
                    <input type="file" name="image"  class="form-control" placeholder="Imagem"/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Atualizar Perfil</button>
                </div>

</form>
@endsection