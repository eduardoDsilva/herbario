@extends('layouts.app')

@section('titulo', 'Epitetos')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('epitetos.index')}}" class="breadcrumb">Epitetos</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @include('layouts._quantidade-de-registros')
    <div class="divider"></div>
    <div class="card">
        <table class="centered responsive-table highlight bordered" id="table">
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
            @forelse($data as $epiteto)
                <tr>
                    <td>{{$epiteto->name}}</td>
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
        <a data-target="create-item" class="btn-floating btn-large modal-trigger" href="#create-item">
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

@section('script')
    <script>

    </script>
@endsection
