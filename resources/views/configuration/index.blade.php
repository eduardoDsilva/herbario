@extends('layouts.app')

@section('content')
    @ability('admin,moderador,gerenciador,coletor', '')
    <div class="container">
        <div class="section">
            <h2>Configurações</h2>
            <div class="divider"></div>
        </div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card z-depth-5">
            <div class="row">
                @ability('admin', '')
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('roles.index')}}">
                        <div class="card small green darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Papéis</span>
                                <div class="divider"></div>
                                <p>I am a very simple card. I am good at containing small bits of information.
                                    I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('permissions.index')}}">
                        <div class="card small teal darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Permissões</span>
                                <div class="divider"></div>
                                <p>I am a very simple card. I am good at containing small bits of information.
                                    I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endability
                @ability('admin,gerenciador,moderador', '')
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('users.index')}}">
                        <div class="card small light-blue darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Usuários</span>
                                <div class="divider"></div>
                                <p>I am a very simple card. I am good at containing small bits of information.
                                    I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endability
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('users.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">
                        <div class="card small indigo darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Configurações da conta</span>
                                <div class="divider"></div>
                                <p>I am a very simple card. I am good at containing small bits of information.
                                    I am convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endability
@endsection