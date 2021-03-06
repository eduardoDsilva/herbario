@extends('layouts.app')

@section('titulo', 'Editar exsicata')
@section('breadcrumb')
    <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
    <a href="{{route('exsicatas.edit', $data->id)}}" class="breadcrumb">Editar exsicata</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @ability('admin,gerenciador,moderador', '')
    <div class="card-panel">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('exsicatas.update', $data->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @METHOD('PUT')
                <div class="section">
                    <div class="row">
                        <h3>Dados da exsicata</h3>
                        <div class="divider"></div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">confirmation_number</i>
                            <input required id="numero" name="numero" type="number" class="validate"
                                   value="{{$data->numero}}">
                            <label for="numero">Número</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">local_florist</i>
                            <select name="genero_id">
                                <option value="" disabled selected>Escolha um genero</option>
                                @foreach($generos as $genero)
                                    <option @if($data->genero->id == $genero->id) selected
                                            @endif value="{{$genero->id}}">{{$genero->name}}</option>
                                @endforeach
                            </select>
                            <label>Genero</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">local_florist</i>
                            <select name="epiteto_id">
                                <option value="" disabled selected>Escolha um epiteto</option>
                                @foreach($epitetos as $epiteto)
                                    <option @if($data->epiteto->id == $epiteto->id) selected
                                            @endif value="{{$epiteto->id}}">{{$epiteto->name}}</option>
                                @endforeach
                            </select>
                            <label>Epiteto</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">local_florist</i>
                            <select name="familia_id">
                                <option value="" disabled selected>Escolha um família</option>
                                @foreach($familias as $familia)
                                    <option @if($data->familia->id == $familia->id) selected
                                            @endif value="{{$familia->id}}">{{$familia->name}}</option>
                                @endforeach
                            </select>
                            <label>Família</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">nature</i>
                            <input id="name" name="name" type="text" class="validate" value="{{$data->name}}">
                            <label for="name">Nome</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">person</i>
                            <input id="autor" name="autor" type="text" class="validate"
                                   value="{{$data->autor}}">
                            <label for="autor">Autor</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">format_list_numbered</i>
                            <input id="escaninho" name="escaninho" type="text" class="validate"
                                   value="{{$data->escaninho}}">
                            <label for="escaninho">Escaninho</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">nature_people</i>
                            <input required id="coletor" name="coletor" type="text" class="validate"
                                   value="{{$data->coletor}}">
                            <label for="coletor">Coletor</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">date_range</i>
                            <input required id="data" name="data" type="text" class="validate"
                                   value="{{$data->data}}">
                            <label for="data">Data</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">person_outline</i>
                            <input id="determinador" name="determinador" type="text" class="validate"
                                   value="{{$data->determinador}}">
                            <label for="determinador">Determinador</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">plus_one</i>
                            <input id="quantidade" name="quantidade" type="number" class="validate"
                                   value="{{$data->quantidade}}">
                            <label for="quantidade">Quantidade</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">business</i>
                            <input id="bdd" name="bdd" type="text" class="validate" value="{{$data->bdd}}">
                            <label for="bdd">BDD</label>
                        </div>
                        <div class="col s12 m12 l12">
                            <div class="input-field col s12 m6 l8">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>IMAGEM</span>
                                        <input name="img" id="img" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input name="img" id="img" class="file-path validate" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m1 l2">
                                <img class="materialboxed"
                                     data-caption="Foto da exsicata {{$data->genero->name}} {{$data->epiteto->name}}"
                                     width="80" height="120"
                                     src="{{$data->image}}">
                            </div>
                            <div class="switch" class="col s12 m2 l1">
                                <p>Apagar Imagem</p>
                                <label>
                                    Não
                                    <input type="checkbox" name="apagaImg">
                                    <span class="lever"></span>
                                    Sim
                                </label>
                            </div>
                        </div>
                    </div>
                    </div>
                        <h4>Localização</h4>
                        <div class="divider"></div>
                        <div class="section">
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">location_on</i>
                                <input required id="municipio" name="municipio" type="text" class="validate"
                                       value="{{$data->endereco->municipio}}">
                                <label for="municipio">Município</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">location_on</i>
                                <input required id="uf" name="uf" type="text" class="validate"
                                       value="{{$data->endereco->uf}}">
                                <label for="uf">UF</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">location_on</i>
                                <input required id="pais" name="pais" type="text" class="validate"
                                       value="{{$data->endereco->pais}}">
                                <label for="pais">País</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">location_searching</i>
                                <input required id="local" name="local" type="text" class="validate"
                                       value="{{$data->endereco->local}}">
                                <label for="local">Local</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">map</i>
                                <input id="latitude" name="latitude" type="number" class="validate"
                                       value="{{$data->endereco->latitude}}">
                                <label for="latitude">Latitude</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">map</i>
                                <input id="longitude" name="longitude" type="number" class="validate"
                                       value="{{$data->endereco->longitude}}">
                                <label for="longitude">Longitude</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">pets</i>
                                <input id="habitat" name="habitat" type="text" class="validate"
                                       value="{{$data->endereco->habitat}}">
                                <label for="habitat">Habitat</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">note</i>
                                <input id="observacao" name="observacao" type="text" class="validate"
                                       value="{{$data->endereco->observacao}}">
                                <label for="observacao">Observação</label>
                            </div>
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
    @endability
    </div>
@endsection
