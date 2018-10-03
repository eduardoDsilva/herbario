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
                            @ability('admin,gerenciador', '')
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('users.edit', $user->id)}}"> <i
                                        class="small material-icons">edit</i></a>
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="#modal1"> <i
                                        class="small material-icons">settings</i></a>
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
                                            <label>Materialize Select</label>
                                        </div>
                                        </br>
                                        </br>
                                        </br>
                                        </br>
                                        </br>
                                        </br>
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
        </div>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red" href="{{route('users.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </div>

@endsection