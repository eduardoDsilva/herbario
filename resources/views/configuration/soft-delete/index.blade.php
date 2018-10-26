@extends('layouts.app')

@section('titulo', 'Registros deletados')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('soft-delete.index')}}" class="breadcrumb">Registros deletados</a>
@endsection

@section('content')

    @include('layouts._breadcrumb')

    <div class="row">
        <div class="col s12 m6 l6 hoverable">
            <a href="{{route('soft-delete.epitetos')}}">
                <div class="card small green darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Epitetos</span>
                        <div class="divider"></div>
                        <p>Um papel é uma coleção de permissões. Os papeis podem ser atribuídos a um usuário
                            específico em um contexto específico.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6 l6 hoverable">
            <a href="{{route('soft-delete.exsicatas')}}">
                <div class="card small blue darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Exsicatas</span>
                        <div class="divider"></div>
                        <p>Um papel é uma coleção de permissões. Os papeis podem ser atribuídos a um usuário
                            específico em um contexto específico.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6 l6 hoverable">
            <a href="{{route('soft-delete.familias')}}">
                <div class="card small red darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Famílias</span>
                        <div class="divider"></div>
                        <p>Um papel é uma coleção de permissões. Os papeis podem ser atribuídos a um usuário
                            específico em um contexto específico.
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col s12 m6 l6 hoverable">
            <a href="{{route('soft-delete.generos')}}">
                <div class="card small yellow darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Generos</span>
                        <div class="divider"></div>
                        <p>Um papel é uma coleção de permissões. Os papeis podem ser atribuídos a um usuário
                            específico em um contexto específico.
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
