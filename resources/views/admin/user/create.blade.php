@extends('layouts.app')

@section('content')
    @ability('admin,moderador', '')
    <div class="container">
        <h3>Criar usuário</h3>
        <div class="divider"></div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
                        <a href="{{route('users.index')}}" class="breadcrumb">Usuários</a>
                        <a href="{{route('users.create')}}" class="breadcrumb">Criar usuário</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card">
            <div class="row">
                <form class="col s12" method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="section">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate">
                                <label for="name">Nome</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="validate">
                                <label for="email">E-mail</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="username" name="username" type="text" class="validate">
                                <label for="username">Usuário</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Senha</label>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h4>Papéis</h4>
                        <div class="divider"></div>
                        <div class="row">
                            @foreach($roles as $role)
                                <p class="input-field col s6 m6 l6">
                                    <label>
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}"/>
                                        <span>{{$role->display_name}}</span>
                                    </label>
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="section">
                        <div class="row">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endability
@endsection