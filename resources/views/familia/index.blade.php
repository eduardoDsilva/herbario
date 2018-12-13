@extends('layouts.app')

@section('titulo', 'Familias')
@section('breadcrumb')
    <a href="{{route('familias.index')}}" class="breadcrumb">Familias</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @include('layouts._quantidade-de-registros')
    <div class="divider"></div>
    <div class="card-panel">
        <div class="row">
            <form method="POST" action="{{ route('familias.filtrar') }}">
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
            @forelse($data as $familia)
                <tr id="{{$familia->id}}">
                    <td id="{{$familia->id}}-name">{{$familia->name}}</td>
                    <td>{{count($familia->exsicata)}}</td>
                    <td><a class="btn tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Exsicatas" href="{{route('familias.show', $familia->id)}}">Exsicatas</a></td>
                    <td>
                        @ability('admin,gerenciador,moderador', '')
                        <a data-target="edit-item" id="familias-edit" class="modal-trigger tooltipped"
                           data-position="top" data-delay="50"
                           data-tooltip="Editar" href="#edit-item" data-id="{{$familia->id}}"
                           data-name="{{$familia->name}}"> <i
                                class="small material-icons">edit</i></a>
                        <a data-target="delete-item" class="modal-trigger tooltipped" data-position="top"
                           data-delay="50"
                           data-tooltip="Deletar" href="#delete-item" data-id="{{$familia->id}}"
                           data-name="{{$familia->name}}"><i
                                class="small material-icons">delete</i></a>
                        @endability
                        <a class="tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Relatório" target="_blank"
                           href="{{route('relatorios-familia', $familia->id)}}"><i
                                class="small material-icons">chrome_reader_mode</i></a>
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
        <a data-target="create-item" class="btn-floating btn-large modal-trigger  tooltipped" data-position="left" data-delay="50" data-tooltip="Adicionar" href="#create-item">
            <i class="large material-icons">add</i>
        </a>
    </div>
    @endability

    @component('layouts.modal-edit', ['route'=>'familias.update', 'titulo'=>'família'])
    @endcomponent

    @component('layouts.modal-store', ['route'=>'familias.store', 'titulo'=>'Criar Família'])
    @endcomponent

    @component('layouts.modal-delete', ['route'=>'familias.destroy', 'titulo'=>'família'])
    @endcomponent

@endsection
