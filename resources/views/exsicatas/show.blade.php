@extends('layouts.app')

@section('titulo', 'Exsicata')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
    <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
    <a href="{{route('exsicatas.show', $data->id)}}" class="breadcrumb">Exibir exsicata</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
        <div class="card">
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons prefix green-text">photo_camera</i> Foto
                    </div>
                    <div class="collapsible-body">
                        <img id="zoom_07" class="responsive-img"
                             src="{{asset('img/small/image1.png')}}"
                             data-zoom-image="{{asset('img/large/image1.jpg')}}"/>
                        <script>
                            $("#zoom_07").elevateZoom({
                                zoomType: "lens",
                                lensShape: "round",
                                lensSize: 200
                            });
                        </script>
                </li>
                <li class="active">
                    <div class="collapsible-header"><i class="material-icons prefix green-text">local_florist</i> Dados
                        da exsicata
                    </div>
                    <div class="collapsible-body">
                        <ul class="collection with-header">
                            <li class="collection-item">
                                <i class="material-icons prefix">local_florist</i>
                                Determinação: {{$data->genero->name}} {{$data->epiteto->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_florist</i>
                                Gênero: {{$data->genero->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_florist</i>
                                Epiteto: {{$data->epiteto->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_florist</i>
                                Família: {{$data->familia->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">local_offer</i> Nome
                                vulgar: {{$data->name}}</li>
                            <li class="collection-item"><i class="material-icons prefix">confirmation_number</i>
                                Número: {{$data->numero}}</li>
                            <li class="collection-item"><i class="material-icons prefix">person</i>
                                Autor: {{$data->autor}}</li>
                            <li class="collection-item"><i class="material-icons prefix">format_list_numbered</i>
                                Escaninho: {{$data->escaninho}}</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons prefix green-text">nature_people</i> Dados
                        da coleta
                    </div>
                    <div class="collapsible-body">
                        <ul class="collection with-header">
                            <li class="collection-item"><i class="material-icons prefix">nature_people</i>
                                Coletor: {{$data->coletor}}</li>
                            <li class="collection-item"><i class="material-icons prefix">date_range</i>
                                Data: {{$data->data}}</li>
                            <li class="collection-item"><i class="material-icons prefix">person_outline</i>
                                Determinador: {{$data->determinador}}</li>
                            <li class="collection-item"><i class="material-icons prefix">plus_one</i>
                                Quantidade: {{$data->quantidade}}</li>
                            <li class="collection-item"><i class="material-icons prefix">business</i>
                                BDD: {{$data->bdd}}</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons prefix green-text">map</i> Endereço</div>
                    <div class="collapsible-body">
                        <ul class="collection with-header">
                            <li class="collection-item"><i class="material-icons prefix">location_on</i>
                                Municipio: {{$data->endereco->municipio}}</li>
                            <li class="collection-item"><i class="material-icons prefix">location_on</i>
                                UF: {{$data->endereco->uf}}</li>
                            <li class="collection-item"><i class="material-icons prefix">location_on</i>
                                País: {{$data->endereco->pais}}</li>
                            <li class="collection-item"><i class="material-icons prefix">location_searching</i>
                                Local: {{$data->endereco->local}}</li>
                            <li class="collection-item"><i class="material-icons prefix">map</i>
                                Latitude: {{$data->endereco->latitude}}</li>
                            <li class="collection-item"><i class="material-icons prefix">map</i>
                                Longitude: {{$data->endereco->longitude}}</li>
                            <li class="collection-item"><i class="material-icons prefix">pets</i>
                                Habitat: {{$data->endereco->habitat}}</li>
                            <li class="collection-item"><i class="material-icons prefix">note</i>
                                Observação: {{$data->endereco->observacao}}</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection