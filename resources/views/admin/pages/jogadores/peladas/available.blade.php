@extends('adminlte::page')

@section('title', "Peladas Disponivéis")

@section('content_header')
    <h1>Peladas Disponivéis</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('jogadores.peladas.available',$jogador->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Pesquise pelo Nome do Evento..." class="form-control" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark ml-1">Pesquisar</button>
            </form>
        </div>

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Local</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('jogadores.peladas.attach',$jogador->id)}}" method="POST">
                        @csrf
                        @foreach ($peladas as $pelada )
                            <tr>
                                <td>
                                    <input type="checkbox" name="peladas[]" value="{{$pelada->id}}">
                                </td>

                                <td>{{ $pelada->nome }}</td>
                                <td>{{ $pelada->data }}</td>
                                <td>{{ $pelada->horario }}</td>
                                <td>{{ $pelada->local}}</td>
                            </tr>            
                         @endforeach

                         <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button class="btn btn-success" type="submit">Se Convocar</button>
                            </td>
                         </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $peladas->appends($filters)->links() !!}
            @else
                {!! $peladas->links() !!}
            @endif
        </div>
    </div>
@stop
