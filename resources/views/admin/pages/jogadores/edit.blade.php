@extends('adminlte::page')

@section('title', "Editar Jogador: $jogador->nome")

@section('content_header')
    <h1>Editar Jogador:{{ $jogador->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('jogadores.update', $jogador->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.jogadores._partials.form')
               
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Editar</button>
                </div>
            </form>
        </div>
    </div>
@stop