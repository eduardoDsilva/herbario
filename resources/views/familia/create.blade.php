@extends('layouts.app')

@section('titulo', 'Epitetos')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('familias.index')}}" class="breadcrumb">Familias</a>
    <a href="{{route('familias.create')}}" class="breadcrumb">Cadastrar familia</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @ability('admin,gerenciador,moderador', '')
    <div class="card">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('familias.store')}}">
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