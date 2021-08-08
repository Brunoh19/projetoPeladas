@extends('adminlte::page')

@section('title', 'Peladas')

@section('content_header')
    <h1>Peladas <a href="{{route('peladas.create')}}" class="btn btn-dark">Add<i class="fas fa-plus ml-1"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('jogadores.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Pesquise pelo Nome..." class="form-control" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark ml-1">Pesquisar</button>
            </form>
        </div>  

        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                
                <thead>
                    <tr>
                        <th>Nome do Evento</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Local</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peladas as $pelada )
                        <tr>
                            <td>{{ $pelada->nome }}</td>
                            <td>{{ date('d/m/Y', strtotime($pelada->data)) }}</td>
                            <td>{{ $pelada->horario }}</td>
                            <td>{{ $pelada->local }}</td>
                            <td>
                                <a href="{{route('peladas.jogadores',$pelada->id)}}" class="btn btn-success">Jogadores Inscritos</a>
                                <a href="{{route('peladas.edit',$pelada->id)}}" class="btn btn-info">Edit</a>    
                                <a href="{{route('peladas.destroy',$pelada->id)}}" class="btn btn-danger"><i class="fas fa-trash" id="btnDeletar"></i></a>
                            </td>
                        </tr>
                    @endforeach
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

