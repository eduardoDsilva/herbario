@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Editar familia</h3>
        <div class="divider"></div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="" class="breadcrumb">Herbário Virtual</a>
                        <a href="{{route('familias.index')}}" class="breadcrumb">Familias</a>
                        <a href="{{route('familias.edit', $familia->id)}}" class="breadcrumb">Editar familias</a>
                    </div>
                </div>
            </nav>
        </div>
        @ability('admin,gerenciador,moderador', '')
        <div class="card">
            <div class="row">
                <form class="col s12" method="POST" action="{{route('familias.update', $familia->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="section">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate" value="{{$familia->name}}">
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