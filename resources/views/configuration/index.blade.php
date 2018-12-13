@extends('layouts.app')

@section('titulo', 'Configurações')
@section('breadcrumb')
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('soft-delete.index')}}" class="breadcrumb">Registros deletados</a>
@endsection

@section('content')
    @include('layouts._breadcrumb')
    @ability('admin,moderador,gerenciador,coletor', '')

    <div class="card z-depth-5">
        <div class="row">
            @ability('admin,moderador', '')
            <div class="col s12 m6 l4 hoverable">
                <a href="{{route('roles.index')}}">
                    <div class="card small green darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Papéis</span>
                            <div class="divider"></div>
                            <p>Um papel é uma coleção de permissões. Os papeis podem ser atribuídos a um usuário
                                específico em um contexto específico.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m6 l4 hoverable">
                <a href="{{route('permissions.index')}}">
                    <div class="card small teal darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Permissões</span>
                            <div class="divider"></div>
                            <p>Uma permissão é uma atribuição concedida para uma ação específica. Por exemplo:</p>
                            <li>Cadastrar exsicata</li>
                            <li>Cadastrar usuário</li>
                            <li>Deletar gênero</li>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m6 l4 hoverable">
                <a href="{{route('audits.index')}}">
                    <div class="card small blue-grey darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Auditoria</span>
                            <div class="divider"></div>
                            <p>A tabela de auditoria possuí todos os registros de açoes dentro do sistema. Dentre
                                elas estão: </p>
                            <li>Registro de criação de exsicata</li>
                            <li>Registro de alteração de exsicata</li>
                            <li>Registro de criação de usuário</li>
                            <li>Dentre vários outros ítens</li>
                        </div>
                    </div>
                </a>
            </div>
            @endability
            @ability('admin,gerenciador,moderador', '')
            <div class="col s12 m6 l4 hoverable">
                <a href="{{route('users.index')}}">
                    <div class="card small light-blue darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Usuários</span>
                            <div class="divider"></div>
                            <p>Acesse este item para visualizar os usuários do sistema.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col s12 m6 l4 hoverable">
                <a href="{{route('soft-delete.index')}}">
                    <div class="card small deep-purple darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Registros deletados</span>
                            <div class="divider"></div>
                            <p>Acesse este item para visualizar os registros deletados do sistema.</p>
                        </div>
                    </div>
                </a>
            </div>
            @endability
            <div class="col s12 m6 l4 hoverable">
                <a href="{{route('users.edit', \Illuminate\Support\Facades\Auth::user()->id)}}">
                    <div class="card small indigo darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Configurações da conta</span>
                            <div class="divider"></div>
                            <p>Acesse este item para poder alteraras configurações da sua conta.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
    @endability
@endsection
