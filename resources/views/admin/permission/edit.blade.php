@extends('layouts.app')

@section('titulo', 'Editar permissão')
@section('breadcrumb')
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('permissions.index')}}" class="breadcrumb">Permissão</a>
    <a href="{{route('permissions.edit', $data->id)}}" class="breadcrumb">Editar permissão</a>
@endsection

@section('content')
    @include('layouts._breadcrumb')
    @ability('admin', '')
    <div class="card-panel">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('permissions.update', $data->id)}}">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <div class="section">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">text_format</i>
                            <input id="name" name="name" type="text" class="validate" value="{{$data->name}}">
                            <label for="name">Nome da permissão</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">web</i>
                            <input id="display_name" name="display_name" type="text" class="validate"
                                   value="{{$data->display_name}}">
                            <label for="display_name">Nome em tela</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <input id="description" name="description" type="text" class="validate"
                                   value="{{$data->description}}">
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
    @endability
@endsection
