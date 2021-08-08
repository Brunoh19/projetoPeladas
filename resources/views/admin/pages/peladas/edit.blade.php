@extends('adminlte::page')

@section('title', "Editar Pelada: $pelada->nome")

@section('content_header')
    <h1>Editar Pelada:{{ $pelada->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('peladas.update', $pelada->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.peladas._partials.form')
               
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Editar</button>
                </div>
            </form>
        </div>
    </div>
@stop