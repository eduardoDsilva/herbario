@extends('layouts.app')

@section('content')
    @ability('admin', '')
    <div class="container">
        <h3>Criar permissão</h3>
        <div class="divider"></div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
                        <a href="{{route('permissions.index')}}" class="breadcrumb">Permissão</a>
                        <a href="{{route('permissions.create')}}" class="breadcrumb">Criar permissão</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card">
            <div class="row">
                <form class="col s12" method="POST" action="{{route('permissions.store')}}">
                    @csrf
                    <div class="section">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate">
                                <label for="name">Nome da permissão</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="display_name" name="display_name" type="text" class="validate">
                                <label for="display_name">Nome em tela</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="description" name="description" type="text" class="validate">
                                <label for="description">Descrição</label>
                            </div>
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
    @endbility
@endsection