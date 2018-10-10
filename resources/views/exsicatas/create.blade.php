@extends('layouts.app')

@section('titulo', 'Cadastrar exsicata')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
    <a href="{{route('exsicatas.create')}}" class="breadcrumb">Cadastrar exsicata</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    @ability('admin,gerenciador,moderador,coletor', '')
    <div class="card">
        <div class="row">
            <form class="col s12" method="POST" action="{{route('exsicatas.index')}}">
                @csrf
                <div class="section">
                    <div class="row">
                        <h3>Dados da exsicata</h3>
                        <div class="divider"></div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">confirmation_number</i>
                            <input required id="numero" name="numero" type="number" class="validate">
                            <label for="numero">Número</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">local_offer</i>
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nome</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">person</i>
                            <input id="autor" name="autor" type="text" class="validate">
                            <label for="autor">Autor</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">format_list_numbered</i>
                            <input id="escaninho" name="escaninho" type="text" class="validate">
                            <label for="escaninho">Escaninho</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">nature_people</i>
                            <input required id="coletor" name="coletor" type="text" class="validate">
                            <label for="coletor">Coletor</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">date_range</i>
                            <input required id="data" name="data" type="text" class="validate">
                            <label for="data">Data</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">person_outline</i>
                            <input id="determinador" name="determinador" type="text" class="validate">
                            <label for="determinador">Determinador</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">plus_one</i>
                            <input id="quantidade" name="quantidade" type="number" class="validate" value="1">
                            <label for="quantidade">Quantidade</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">business</i>
                            <input id="bdd" name="bdd" type="text" class="validate" value="HMJD">
                            <label for="bdd">BDD</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>IMAGEM</span>
                                    <input name="imagem" id="imagem" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input name="imagem" id="imagem" class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">local_florist</i>
                            <select name="genero_id">
                                <option value="" disabled selected>Escolha um genero</option>
                                @foreach($generos as $genero)
                                    <option value="{{$genero->id}}">{{$genero->name}}</option>
                                @endforeach
                            </select>
                            <label>Genero</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">local_florist</i>
                            <select name="epiteto_id">
                                <option value="" disabled selected>Escolha um epiteto</option>
                                @foreach($epitetos as $epiteto)
                                    <option value="{{$epiteto->id}}">{{$epiteto->name}}</option>
                                @endforeach
                            </select>
                            <label>Epiteto</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">local_florist</i>
                            <select name="familia_id">
                                <option value="" disabled selected>Escolha um família</option>
                                @foreach($familias as $familia)
                                    <option value="{{$familia->id}}">{{$familia->name}}</option>
                                @endforeach
                            </select>
                            <label>Família</label>
                        </div>
                        <h4>Endereço</h4>
                        <div class="divider"></div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">location_on</i>
                            <input required id="municipio" name="municipio" type="text" class="validate"
                                   value="São Leopoldo">
                            <label for="municipio">Município</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">location_on</i>
                            <input required id="uf" name="uf" type="text" class="validate" value="RS">
                            <label for="uf">UF</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">location_on</i>
                            <input required id="pais" name="pais" type="text" class="validate" value="Brasil">
                            <label for="pais">País</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">location_searching</i>
                            <input required id="local" name="local" type="text" class="validate">
                            <label for="local">Local</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">map</i>
                            <input id="latitude" name="latitude" type="text" class="validate">
                            <label for="latitude">Latitude</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <i class="material-icons prefix">map</i>
                            <input id="longitude" name="longitude" type="text" class="validate">
                            <label for="longitude">Longitude</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">pets</i>
                            <input id="habitat" name="habitat" type="text" class="validate">
                            <label for="habitat">Habitat</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">note</i>
                            <input id="observacao" name="observacao" type="text" class="validate">
                            <label for="observacao">Observação</label>
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
    </div>
@endsection