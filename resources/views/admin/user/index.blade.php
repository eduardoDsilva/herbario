@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section">
            <h2>Usuários</h2>
            <div class="divider"></div>
        </div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
                        <a href="{{route('users.index')}}" class="breadcrumb">Usuários</a>
                    </div>
                </div>
            </nav>
        </div>
        <h4>Mostrando 1 - 10 de {{$users->total()}} registros</h4>
        <div class="card">
            <table class="centered responsive-table highlight bordered">
                <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Nome</th>
                    <th>Papel</th>
                    @ability('admin,gerenciador', '')
                    <th>Ações</th>
                    @endability
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>@foreach($user->role as $role){{$role->display_name}}<br>@endforeach</td>
                        <td>
                            @ability('admin', '')
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('users.edit', $user->id)}}"> <i
                                        class="small material-icons">edit</i></a>
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="#modal1"> <i
                                        class="small material-icons">settings</i></a>
                            <a data-target="modal2" class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Deletar" href="#modal1" data-id="{{$user->id}}"
                               data-name="{{$user->name}}"><i
                                        class="small material-icons">delete</i></a>
                            @endability
                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                                <form method="POST" action="{{route('users.update', $user->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="modal-content">
                                        <h4>Papéis</h4>
                                        <blockquote>Selecione os papéis do usuário.</blockquote>
                                        <div class="input-field col s12">
                                            <select name="roles[]" multiple>
                                                <option value="" disabled selected>Selecione o papel</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                                                @endforeach
                                            </select>
                                            <label>Selecione o papel</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="modal-close waves-effect waves-green btn-flat">
                                            Confirmar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @empty
                            <td>Nenhum papél cadastrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="section">
                {{$users->links()}}
            </div>
        </div>
        @ability('admin', '')
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red" href="{{route('users.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
        @endability
    </div>

    <div id="modal2" class="modal">
        <form action="{{route('users.destroy', 'delete')}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <h4>Deletar</h4>
                <p>Você tem certeza que deseja deletar o usuário abaixo?</p>
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
