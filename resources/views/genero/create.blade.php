@extends('layouts.app')

@section('titulo', 'Cadastrar gênero')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('generos.index')}}" class="breadcrumb">Gêneros</a>
    <a href="{{route('generos.create')}}" class="breadcrumb">Cadastrar gênero</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @ability('admin,gerenciador,moderador', '')
    <div class="card">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('generos.store')}}">
                @csrf
                <div class="section">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nome</label>
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
    @endability
@endsection