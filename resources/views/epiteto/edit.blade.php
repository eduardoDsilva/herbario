@extends('layouts.app')


@section('content')@section('titulo', 'Editar epíteto')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('epitetos.index')}}" class="breadcrumb">Epitetos</a>
    <a href="{{route('epitetos.edit', $data->id)}}" class="breadcrumb">Editar epiteto</a>
@endsection

    @include('layouts._breadcrumb')
    @ability('admin,gerenciador,moderador', '')
    <div class="card">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('epitetos.update', $data->id)}}">
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
