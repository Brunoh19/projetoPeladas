@extends('adminlte::page')

@section('title', 'Cadastrar Nova Pelada')

@section('content_header')
    <h1>Cadastrar Nova Pelada</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('peladas.store')}}" class="form" method="POST">
                
                @include('admin.pages.peladas._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@stop