@extends('layouts.app')

@section('titulo', 'Editar gênero')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('generos.index')}}" class="breadcrumb">Gêneros</a>
    <a href="{{route('generos.edit', $data->id)}}" class="breadcrumb">Editar gênero</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
        @ability('admin,gerenciador,moderador', '')
        <div class="card">
            <div class="row">
                <form class="col s12" method="POST" action="{{route('generos.update', $data->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="section">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate" value="{{$data->name}}">
                                <label for="name">Nome</label>
                            </div>
                        </div>
                    </div>
                    <div class="fixed-action-btn">
                        <button type="submit" class="btn-floating btn-large">
                            <i class="large material-icons">add</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endability
@endsection
