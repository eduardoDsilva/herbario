@extends('layouts.app')

@section('titulo', 'Registros deletados')
@section('breadcrumb')
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('soft-delete.index')}}" class="breadcrumb">Registros deletados</a>
    <a href="" class="breadcrumb">{{$tipo}}</a>
@endsection

@section('content')

    @include('layouts._breadcrumb')

    <div class="divider"></div>
    <div class="card">

        <table class="centered responsive-table highlight bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                @ability('admin,gerenciador,moderador', '')
                <th>Ações</th>
                @endability
            </tr>
            </thead>
            <tbody>
            @forelse($datas as $data)
                <tr>
                    <td>
                        {{$data->id}}
                    </td>
                    <td>@if($tipo=='Exsicatas'){{$data->genero->name}} {{$data->epiteto->name}}@else{{$data->name}}@endif</td>
                    @ability('admin,gerenciador,moderador', '')
                    <td>
                        <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Recuperar e salvar"
                           @if($tipo == "Epitetos")
                           href="{{route('soft-delete.epitetos.recovery', $data->id)}}">
                            @elseif($tipo == "Exsicatas")
                           href="{{route('soft-delete.exsicatas.recovery', $data->id)}}">
                            @elseif($tipo == "Generos")
                           href="{{route('soft-delete.generos.recovery', $data->id)}}">
                            @elseif($tipo == "Familias")
                           href="{{route('soft-delete.familias.recovery', $data->id)}}">
                            @endif
                            <i class="small material-icons">save</i></a>
                    </td>
                    @endability
                    @empty
                        <td>Nenhum registro encontrado</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>

@endsection
