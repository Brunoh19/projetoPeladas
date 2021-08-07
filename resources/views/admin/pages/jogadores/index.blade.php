@extends('adminlte::page')

@section('title', 'Jogadores')

@section('content_header')
    <h1>Jogadores <a href="{{route('jogadores.create')}}" class="btn btn-dark">Add<i class="fas fa-plus ml-1"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="" method="POST" class="form form-inline">
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
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>E-mail</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jogadores as $jogador )
                        <tr>
                            <td>{{ $jogador->nome }}</td>
                            <td>{{ $jogador->apelido }}</td>
                            <td>{{ $jogador->email }}</td>
                            <td>
                                <a href="" class="btn btn-success">Peladas Escalado</a>
                                <a href="{{route('jogadores.edit',$jogador->id)}}" class="btn btn-info">Edit</a>    
                                <a href="{{route('jogadores.destroy',$jogador->id)}}" class="btn btn-danger"><i class="fas fa-trash" id="btnDeletar"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $jogadores->appends($filters)->links() !!}
            @else
                {!! $jogadores->links() !!}
            @endif
        </div>
    </div>
@stop

