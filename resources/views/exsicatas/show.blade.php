@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Exsicatas</h3>
        <div class="divider"></div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="" class="breadcrumb">Herbário Virtual</a>
                        <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
                        <a href="{{route('exsicatas.show', $exsicata->id)}}"
                           class="breadcrumb">{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card">
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons prefix green-text">photo_camera</i> Foto</div>
                    <div class="collapsible-body"><img class="materialboxed responsive-img"
                                                       src="https://materializecss.com/images/sample-1.jpg"></div>
                </li>
                <li class="active">
                    <div class="collapsible-header"><i class="material-icons prefix green-text">local_florist</i> Dados
                        da exsicata
                    </div>
                    <div class="collapsible-body">
                        <ul class="collection with-header">
                            <li class="collection-item">
                                <i class="material-icons prefix">local_florist</i> Determinação: {{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_florist</i> Gênero: {{$exsicata->genero->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_florist</i> Epiteto: {{$exsicata->epiteto->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_florist</i> Família: {{$exsicata->familia->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_offer</i> Nome vulgar: {{$exsicata->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">confirmation_number</i> Número: {{$exsicata->numero}}</li>
                            <li class="collection-item"><i class="material-icons prefix">person</i> Autor: {{$exsicata->autor}}</li>
                            <li class="collection-item"><i class="material-icons prefix">format_list_numbered</i> Escaninho: {{$exsicata->escaninho}}</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons prefix green-text">nature_people</i> Dados
                        da coleta
                    </div>
                    <div class="collapsible-body">
                        <ul class="collection with-header">
                            <li class="collection-item"><i class="material-icons prefix">nature_people</i> Coletor: {{$exsicata->coletor}}</li>
                            <li class="collection-item"><i class="material-icons prefix">date_range</i> Data: {{$exsicata->coletor}}</li>
                            <li class="collection-item"><i class="material-icons prefix">person_outline</i> Determinador: {{$exsicata->determinador}}</li>
                            <li class="collection-item"><i class="material-icons prefix">plus_one</i> Quantidade: {{$exsicata->quantidade}}</li>
                            <li class="collection-item"><i class="material-icons prefix">business</i> BDD: {{$exsicata->bdd}}</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons prefix green-text">map</i> Endereço</div>
                    <div class="collapsible-body">
                        <ul class="collection with-header">
                            <li class="collection-item"><i class="material-icons prefix">location_on</i> Municipio: {{$exsicata->endereco->municipio}}</li>
                            <li class="collection-item"><i class="material-icons prefix">location_on</i> UF: {{$exsicata->endereco->uf}}</li>
                            <li class="collection-item"><i class="material-icons prefix">location_on</i> País: {{$exsicata->endereco->pais}}</li>
                            <li class="collection-item"><i class="material-icons prefix">location_searching</i> Local: {{$exsicata->endereco->local}}</li>
                            <li class="collection-item"><i class="material-icons prefix">map</i> Latitude: {{$exsicata->endereco->latitude}}</li>
                            <li class="collection-item"><i class="material-icons prefix">map</i> Longitude: {{$exsicata->endereco->longitude}}</li>
                            <li class="collection-item"><i class="material-icons prefix">pets</i> Habitat: {{$exsicata->endereco->habitat}}</li>
                            <li class="collection-item"><i class="material-icons prefix">note</i> Observação: {{$exsicata->endereco->observacao}}</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection