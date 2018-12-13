@extends('layouts.app')

@section('titulo', 'Editar papel')
@section('breadcrumb')
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('roles.index')}}" class="breadcrumb">Papeis</a>
    <a href="{{route('roles.edit', $data->id)}}" class="breadcrumb">Editar papel</a>
@endsection

@section('content')
    @include('layouts._breadcrumb')
    @ability('admin', '')
    <div class="card-panel">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('roles.update', $data->id)}}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="section">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">text_format</i>
                            <input id="name" name="name" type="text" class="validate" value="{{$data->name}}">
                            <label for="name">Nome do papel</label>
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
                    <h4>Permissões</h4>
                    <div class="divider"></div>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <p class="input-field col s6 m6 l6">
                                <label>
                                    <input
                                        @foreach($data->permission as $p) @if($p->name == $permission->name) checked="checked"
                                        @endif @endforeach type="checkbox" name="permission[]"
                                        value="{{$permission->id}}"/>
                                    <span>{{$permission->name}}</span>
                                </label>
                            </p>
                        @endforeach
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
