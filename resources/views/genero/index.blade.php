@extends('layouts.app')

@section('titulo', 'Gêneros')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('generos.index')}}" class="breadcrumb">Gêneros</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    <div class="divider"></div>
    <div class="card">
        <table class="centered responsive-table highlight bordered">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade de Exsicatas</th>
                <th>Exsicatas</th>
                @ability('admin,gerenciador,moderador', '')
                <th>Ações</th>
                @endability
            </tr>
            </thead>
            <tbody>
            @forelse($data as $genero)
                <tr>
                    <td>{{$genero->name}}</td>
                    <td>{{count($genero->exsicata)}}</td>
                    <td><a class="btn tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Exsicatas" href="{{route('generos.show', $genero->id)}}">Exsicatas</a></td>
                    <td>
                        @ability('admin,gerenciador,moderador', '')
                        <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Editar" href="{{route('generos.edit', $genero->id)}}"> <i
                                    class="small material-icons">edit</i></a>
                        @endability
                    </td>
                    @empty
                        <td>Nenhuma família cadastrada</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="section">
            {{$data->links()}}
        </div>
    </div>
    @ability('admin,gerenciador,moderador', '')
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{route('generos.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
    @endability
    </div>

@endsection