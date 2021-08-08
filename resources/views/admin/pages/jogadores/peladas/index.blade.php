@extends('adminlte::page')

@section('title', "Peladas Que o Jogador $jogador->nome está Inscrito")

@section('content_header')
    <h1>Peladas Que o Jogador <strong> {{$jogador->nome}} </strong> está Inscrito 
        <a href="{{route('jogadores.peladas.available',$jogador->id)}}" class="btn btn-dark">Add<i class="fas fa-plus ml-1"></i></a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                
                <thead>
                    <tr>
                        <th>Nome Do Evento</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Local</th>
                        <th width="90">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peladas as $pelada )
                        <tr>
                            <td>{{ $pelada->nome }}</td>
                            <td>{{ $pelada->data }}</td>
                            <td>{{ $pelada->horario }}</td>
                            <td>{{ $pelada->local }}</td>
                            <td>
                                <a href="{{route('jogadores.peladas.detach',[$jogador->id, $pelada->id])}}" class="btn btn-danger"><i class="fas fa-trash" id="btnDeletar"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {!! $peladas->links() !!}
        </div>
    </div>
@stop

