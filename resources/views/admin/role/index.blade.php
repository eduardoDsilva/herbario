@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section">
            <h2>Papéis</h2>
            <div class="divider"></div>
        </div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
                        <a href="{{route('roles.index')}}" class="breadcrumb">Papéis</a>
                    </div>
                </div>
            </nav>
        </div>
        <h4>Mostrando 1 - 10 de {{$data->total()}} registros</h4>
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
                @forelse($data as $papel)
                    <tr>
                        <td>{{$papel->name}}</td>
                        <td>{{$papel->display_name}}</td>
                        <td>{{$papel->description}}</td>
                        <td>
                            @ability('admin', '')
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('roles.edit', $papel->id)}}"> <i
                                        class="small material-icons">edit</i></a>
                            <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="Visualizar"
                               href="#">
                                <i class="small material-icons">library_books</i></a>
                            <a data-target="modal1" class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Deletar" href="#modal1" data-id="{{$papel->id}}"
                               data-name="{{$papel->name}}"><i
                                        class="small material-icons">delete</i></a>
                        </td>
                        @endability
                        @empty
                            <td>Nenhum papél cadastrado</td>
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
            <a class="btn-floating btn-large red" href="{{route('roles.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
        @endability
    </div>

    <div id="modal1" class="modal">
        <form action="{{route('roles.destroy', 'delete')}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <h4>Deletar</h4>
                <p>Você tem certeza que deseja deletar o papel abaixo?</p>
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