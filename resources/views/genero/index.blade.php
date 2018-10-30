@extends('layouts.app')

@section('titulo', 'Gêneros')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('generos.index')}}" class="breadcrumb">Gêneros</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @include('layouts._quantidade-de-registros')
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
                        <a data-target="edit-item" class="modal-trigger tooltipped" id="generos-edit" data-position="top"
                           data-delay="50"
                           data-tooltip="Editar" href="#edit-item" data-id="{{$genero->id}}" data-name="{{$genero->name}}"> <i
                                class="small material-icons">edit</i></a>
                        <a data-target="delete-item" class="modal-trigger tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Deletar" href="#delete-item" data-id="{{$genero->id}}"
                           data-name="{{$genero->name}}"><i
                                class="small material-icons">delete</i></a>
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
        <a data-target="create-item" class="btn-floating btn-large modal-trigger" href="#create-item">
            <i class="large material-icons">add</i>
        </a>
    </div>
    @endability

    @component('layouts.modal-edit', ['route'=>'generos.update', 'titulo'=>'gênero'])
    @endcomponent

    @component('layouts.modal-store', ['route'=>'generos.store', 'titulo'=>'Criar gêneros'])
    @endcomponent

    @component('layouts.modal-delete', ['route'=>'generos.destroy', 'titulo'=>'gênero'])
    @endcomponent

@endsection

