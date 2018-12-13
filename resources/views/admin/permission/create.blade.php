@extends('layouts.app')

@section('titulo', 'Criar permissão')
@section('breadcrumb')
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('permissions.index')}}" class="breadcrumb">Permissão</a>
    <a href="{{route('permissions.create')}}" class="breadcrumb">Criar permissão</a>
@endsection

@section('content')
    @include('layouts._breadcrumb')
    @ability('admin', '')
    <div class="card-panel">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('permissions.store')}}">
                @csrf
                <div class="section">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">text_format</i>
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nome da permissão</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">web</i>
                            <input id="display_name" name="display_name" type="text" class="validate">
                            <label for="display_name">Nome em tela</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
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
    @endability
@endsection
