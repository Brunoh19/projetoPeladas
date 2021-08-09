@extends('adminlte::page')

@section('title', "Jogadores Inscritos no Evento $pelada->nome")

@section('content_header')
    <h1>Jogadores Inscritos no Evento <strong> {{$pelada->nome}} </strong> está Inscrito</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                
                <thead>
                    <tr>
                        <th width="200px">Nome</th>
                        <th>Apelido</th>
                        <th>E-mail</th>
                        <th width="90">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jogadores as $jogador )
                        <tr>
                            <td>{{ $jogador->nome }}</td>
                            <td>{{ $jogador->apelido }}</td>
                            <td>{{ $jogador->email }}</td>
                            <td>
                                <a href="{{route('jogadores.peladas.detach',[$jogador->id, $pelada->id])}}" class="btn btn-danger"><i class="fas fa-trash" id="btnDeletar"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {!! $jogadores->links() !!}
        </div>
    </div>
@stop

