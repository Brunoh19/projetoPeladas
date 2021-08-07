@extends('adminlte::page')

@section('title', 'Cadastrar Novo Jogador')

@section('content_header')
    <h1>Cadastrar Novo Jogador</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('jogadores.store')}}" class="form" method="POST">
                
                @include('admin.pages.jogadores._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop