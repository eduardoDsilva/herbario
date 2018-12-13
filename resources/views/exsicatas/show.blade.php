@extends('layouts.app')

@section('titulo', 'Exsicata')
@section('breadcrumb')
    <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
    <a href="{{route('exsicatas.show', $data->id)}}" class="breadcrumb">Exibir exsicata</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    <div class="card-panel">
        <img style="padding: 10px;" id="image1" src="{{$data->image}}" width="100%"/>
        <script type="text/javascript">
            ;(function ($) {
                $(window).on("load", function () {
                    var $img = $("#image1").imgViewer2();
                });
            })(jQuery);
        </script>
        <div class="divider"></div>
            <h5><i class="material-icons prefix green-text">local_florist</i> Dados
                da exsicata</h5>
            <p>
                <i class="material-icons prefix">local_florist</i>
                Determinação: {{$data->genero->name}} {{$data->epiteto->name}}
            </p>
            <p><i class="material-icons prefix">local_florist</i>
                Gênero: {{$data->genero->name}}</p>
            <p><i class="material-icons prefix">local_florist</i>
                Epiteto: {{$data->epiteto->name}}</p>
            <p><i class="material-icons prefix">local_florist</i>
                Família: {{$data->familia->name}}</p>
            <p><i class="material-icons prefix">local_offer</i> Nome
                vulgar: {{$data->name}}</p>
            <p><i class="material-icons prefix">confirmation_number</i>
                Número: {{$data->numero}}</p>
            <p><i class="material-icons prefix">person</i>
                Autor: {{$data->autor}}</p>
            <p><i class="material-icons prefix">format_list_numbered</i>
                Escaninho: {{$data->escaninho}}</p>
        <div class="divider"></div>
            <h5><i class="material-icons prefix green-text">nature_people</i> Dados
                da coleta</h5>
            <p><i class="material-icons prefix">nature_people</i>
                Coletor: {{$data->coletor}}</p>
            <p><i class="material-icons prefix">date_range</i>
                Data: {{$data->data}}</p>
            <p><i class="material-icons prefix">person_outline</i>
                Determinador: {{$data->determinador}}</p>
            <p><i class="material-icons prefix">plus_one</i>
                Quantidade: {{$data->quantidade}}</p>
            <p><i class="material-icons prefix">business</i>
                BDD: {{$data->bdd}}</p>
        <div class="divider"></div>
            <h5><i class="material-icons prefix green-text">map</i> Endereço</h5>
            <p><i class="material-icons prefix">location_on</i>
                Municipio: {{$data->endereco->municipio}}</p>
            <p><i class="material-icons prefix">location_on</i>
                UF: {{$data->endereco->uf}}</p>
            <p><i class="material-icons prefix">location_on</i>
                País: {{$data->endereco->pais}}</p>
            <p><i class="material-icons prefix">location_searching</i>
                Local: {{$data->endereco->local}}</p>
            <p><i class="material-icons prefix">map</i>
                Latitude: {{$data->endereco->latitude}}</p>
            <p><i class="material-icons prefix">map</i>
                Longitude: {{$data->endereco->longitude}}</p>
            <p><i class="material-icons prefix">pets</i>
                Habitat: {{$data->endereco->habitat}}</p>
            <p><i class="material-icons prefix">note</i>
                Observação: {{$data->endereco->observacao}}</p>
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large tooltipped" data-position="left" data-delay="50" data-tooltip="Opções">
            <i class="large material-icons">dehaze</i>
        </a>
        <ul>
            @ability('admin,gerenciador,moderador', '')
            <li><a href="{{route('exsicatas.edit', $data->id)}}" class="btn-floating blue tooltipped"
                   data-position="left" data-delay="50"
                   data-tooltip="Editar"><i class="material-icons">edit</i></a></li>
            <li><a class="btn-floating red modal-trigger tooltipped" data-position="left" data-delay="50"
                   data-tooltip="Deletar" data-target="modal1" href="#modal1" data-id="{{$data->id}}"
                   data-name="{{$data->genero->name}} {{$data->epiteto->name}}"><i class="material-icons">delete</i></a>
            </li>
            @endability
            <li><a class="btn-floating modal-trigger green darken-1 tooltipped"  data-target="relatoriomodal" data-position="left"
                   data-delay="50" data-tooltip="Relatório" href="#relatoriomodal" data-id="{{$data->id}}"
                   data-name="{{$data->genero->name}} {{$data->epiteto->name}}"><i
                        class="material-icons">chrome_reader_mode</i></a></li>
            <li><a class='btn-floating tooltipped yellow darken-4' data-position="top" data-delay="50"
                   data-tooltip="Etiqueta" href='{{route('relatorios-etiquetas')}}' target="_blank"><i
                        class="large material-icons">label</i></a></li>
        </ul>
    </div>


    <div id="modal1" class="modal">
        <form action="{{route('exsicatas.destroy', 'delete')}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <h4>Deletar</h4>
                <p>Você tem certeza que deseja deletar a exsicata abaixo?</p>
                <div class="row">
                    <label for="name_delete">Nome:</label>
                    <div class="input-field col s12">
                        <input class="validate" hidden name="id" type="number" id="id-delete">
                        <input disabled class="validate" type="text" id="name-delete">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn red delete" type="submit">Sim</button>
            </div>
        </form>
    </div>

    @include('layouts.modal-relatorio')

@endsection
