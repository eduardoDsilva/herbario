@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section">
            <h2>Permissão</h2>
            <div class="divider"></div>
        </div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
                        <a href="{{route('permissions.index')}}" class="breadcrumb">Permissão</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card">
            <table class="centered responsive-table highlight bordered">
                <thead>
                <tr>
                    <th>Papel</th>
                    <th>Nome em tela</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->display_name}}</td>
                        <td>{{$permission->description}}</td>
                        <td>
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('permissions.edit', $permission->id)}}"> <i class="small material-icons">edit</i></a>
                            <a data-target="modal1" class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Deletar" href="#"> <i class="small material-icons">delete</i></a>
                            <a class="tooltipped" data-position="top" data-delay="50" data-tooltip="Visualizar"
                               href="#">
                                <i class="small material-icons">library_books</i></a></td>
                        @empty
                            <td>Nenhuma permissão cadastrada</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red" href="{{route('permissions.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>
@endsection