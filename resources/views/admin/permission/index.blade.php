@extends('layouts.app')

@section('titulo', 'Permissão')
@section('breadcrumb')
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('permissions.index')}}" class="breadcrumb">Permissão</a>
@endsection

@section('content')
    @include('layouts._breadcrumb')
    <h4>Mostrando 1 - 10 de {{$data->total()}} registros</h4>
    <div class="divider"></div>
    <div class="card">
        <table class="centered responsive-table highlight bordered">
            <thead>
            <tr>
                <th>Papel</th>
                <th>Nome em tela</th>
                <th>Descrição</th>
                @ability('admin', '')
                <th>Ações</th>
                @endability
            </tr>
            </thead>
            <tbody>
            @forelse($data as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->display_name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>
                        @ability('admin', '')
                        <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Editar" href="{{route('permissions.edit', $permission->id)}}"> <i
                                class="small material-icons">edit</i></a>
                        <a data-target="modal1" class="modal-trigger tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Deletar" href="#modal1" data-id="{{$permission->id}}"
                           data-name="{{$permission->name}}"><i
                                class="small material-icons">delete</i></a>
                    </td>
                    @endability
                    @empty
                        <td>Nenhuma permissão cadastrada</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="section">
            {{$data->links()}}
        </div>
    </div>
    @ability('admin', '')
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{route('permissions.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
    @endability
    </div>

    <div id="modal1" class="modal">
        <form action="{{route('permissions.destroy', 'delete')}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <h4>Deletar</h4>
                <p>Você tem certeza que deseja deletar a permissão abaixo?</p>
                <div class="row">
                    <label for="name_delete">Nome:</label>
                    <div class="input-field col s12">
                        <input class="validate" hidden name="id" type="number" id="id_delete">
                        <input disabled class="validate" type="text" id="name_delete">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn red delete" type="submit">Sim</button>
            </div>
        </form>
    </div>
@endsection
