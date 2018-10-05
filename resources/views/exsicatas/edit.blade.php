@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Editar exsicata</h3>
        <div class="divider"></div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="" class="breadcrumb">Herbário Virtual</a>
                        <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
                        <a href="{{route('exsicatas.edit', $exsicata->id)}}" class="breadcrumb">Editar exsicata</a>
                    </div>
                </div>
            </nav>
        </div>
        @ability('admin,gerenciador,moderador', '')
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
                                <input required id="numero" name="numero" type="number" class="validate"
                                       value="{{$exsicata->numero}}">
                                <label for="numero">Número</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">nature</i>
                                <input id="name" name="name" type="text" class="validate" value="{{$exsicata->name}}">
                                <label for="name">Nome</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">person</i>
                                <input id="autor" name="autor" type="text" class="validate"
                                       value="{{$exsicata->autor}}">
                                <label for="autor">Autor</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">format_list_numbered</i>
                                <input id="escaninho" name="escaninho" type="text" class="validate"
                                       value="{{$exsicata->escaninho}}">
                                <label for="escaninho">Escaninho</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">nature_people</i>
                                <input required id="coletor" name="coletor" type="text" class="validate"
                                       value="{{$exsicata->coletor}}">
                                <label for="coletor">Coletor</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">date_range</i>
                                <input required id="data" name="data" type="text" class="validate"
                                       value="{{$exsicata->data}}">
                                <label for="data">Data</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">person_outline</i>
                                <input id="determinador" name="determinador" type="text" class="validate"
                                       value="{{$exsicata->determinador}}">
                                <label for="determinador">Determinador</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">plus_one</i>
                                <input id="quantidade" name="quantidade" type="number" class="validate"
                                       value="{{$exsicata->quantidade}}">
                                <label for="quantidade">Quantidade</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">business</i>
                                <input id="bdd" name="bdd" type="text" class="validate" value="{{$exsicata->bdd}}">
                                <label for="bdd">BDD</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">business</i>
                                <input id="imagem" name="imagem" type="text" class="validate">
                                <label for="imagem">Imagem</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">local_florist</i>
                                <select name="genero_id">
                                    <option value="" disabled selected>Escolha um genero</option>
                                    @foreach($generos as $genero)
                                        <option @if($exsicata->genero->id == $genero->id) selected
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
                                        <option @if($exsicata->epiteto->id == $epiteto->id) selected
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
                                        <option @if($exsicata->familia->id == $familia->id) selected
                                                @endif value="{{$familia->id}}">{{$familia->name}}</option>
                                    @endforeach
                                </select>
                                <label>Família</label>
                            </div>
                            <h4>Endereço</h4>
                            <div class="divider"></div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">location_on</i>
                                <input required id="municipio" name="municipio" type="text" class="validate"
                                       value="{{$exsicata->endereco->municipio}}">
                                <label for="municipio">Município</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">location_on</i>
                                <input required id="uf" name="uf" type="text" class="validate"
                                       value="{{$exsicata->endereco->uf}}">
                                <label for="uf">UF</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">location_on</i>
                                <input required id="pais" name="pais" type="text" class="validate"
                                       value="{{$exsicata->endereco->pais}}">
                                <label for="pais">País</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <i class="material-icons prefix">location_searching</i>
                                <input required id="local" name="local" type="text" class="validate"
                                       value="{{$exsicata->endereco->local}}">
                                <label for="local">Local</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">map</i>
                                <input id="latitude" name="latitude" type="number" class="validate"
                                       value="{{$exsicata->endereco->latitude}}">
                                <label for="latitude">Latitude</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <i class="material-icons prefix">map</i>
                                <input id="longitude" name="longitude" type="number" class="validate"
                                       value="{{$exsicata->endereco->longitude}}">
                                <label for="longitude">Longitude</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">pets</i>
                                <input id="habitat" name="habitat" type="text" class="validate"
                                       value="{{$exsicata->endereco->habitat}}">
                                <label for="habitat">Habitat</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">note</i>
                                <input id="observacao" name="observacao" type="text" class="validate"
                                       value="{{$exsicata->endereco->observacao}}">
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