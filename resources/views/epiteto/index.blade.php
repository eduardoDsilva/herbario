@extends('layouts.app')

@section('titulo', 'Epitetos')
@section('breadcrumb')
    <a href="{{route('epitetos.index')}}" class="breadcrumb">Epitetos</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @include('layouts._quantidade-de-registros')
    <div class="divider"></div>
    <div class="card-panel">
        <div class="row">
            <form method="POST" action="{{ route('epitetos.filtrar') }}">
                <div class="input-field col s12 m12 l4">
                    <select required name="tipo">
                        <option value="" disabled selected>Filtrar por...</option>
                        <option value="nome">Nome</option>
                    </select>
                    <label>Filtros</label>
                </div>
                <div class="input-field col s10 m11 l7">
                    <input id="search" class="tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Insira um complemento para a pesquisa" type="text" name="search" required>
                    <label for="search">Pesquise no sistema...</label>
                </div>
                {{csrf_field()}}
                <div class="input-field col s1 m1 l1">
                    <button type="submit" class="btn-floating tooltipped" data-position="top" data-delay="50"
                            data-tooltip="Clique aqui para pesquisar"><i class="material-icons">search</i></button>
                </div>
            </form>
        </div>
        <table class="centered responsive-table highlight bordered" id="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Exsicatas</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $epiteto)
                <tr id="{{$epiteto->id}}">
                    <td id="{{$epiteto->id}}-name">{{$epiteto->name}}</td>
                    <td>{{count($epiteto->exsicata)}}</td>
                    <td><a class="btn tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Exsicatas" href="{{route('epitetos.show', $epiteto->id)}}">Exsicatas</a></td>
                    <td>
                        @ability('admin,gerenciador,moderador', '')
                        <a data-target="edit-item" class="modal-trigger tooltipped" id="epitetos-edit"
                           data-position="top"
                           data-delay="50"
                           data-tooltip="Editar" href="#edit-item" data-id="{{$epiteto->id}}"
                           data-name="{{$epiteto->name}}"> <i
                                class="small material-icons">edit</i></a>
                        <a data-target="delete-item" class="modal-trigger tooltipped" data-position="top"
                           data-delay="50"
                           data-tooltip="Deletar" href="#delete-item" data-id="{{$epiteto->id}}"
                           data-name="{{$epiteto->name}}"><i
                                class="small material-icons">delete</i></a>
                        @endability
                        <a class="tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Relatório" target="_blank"
                           href="{{route('relatorios-epiteto', $epiteto->id)}}"><i
                                class="small material-icons">chrome_reader_mode</i></a>
                    </td>
                    @empty
                        <td>Nenhum epiteto cadastrado</td>
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
        <a data-target="create-item" class="btn-floating btn-large modal-trigger  tooltipped" data-position="left" data-delay="50" data-tooltip="Adicionar" href="#create-item">
            <i class="large material-icons">add</i>
        </a>
    </div>
    @endability

    @component('layouts.modal-edit', ['route'=>'epitetos.update', 'titulo'=>'epítetos'])
    @endcomponent

    @component('layouts.modal-store', ['route'=>'epitetos.store', 'titulo'=>'Criar epítetos'])
    @endcomponent

    @component('layouts.modal-delete', ['route'=>'epitetos.destroy', 'titulo'=>'epíteto'])
    @endcomponent

@endsection
