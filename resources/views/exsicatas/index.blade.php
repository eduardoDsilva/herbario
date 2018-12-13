@extends('layouts.app')

@section('titulo', 'Exsicatas')
@section('breadcrumb')
    <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    <div class="row">
        <div class="col s12 m10 l10">
            @include('layouts._quantidade-de-registros')
        </div>
        <div class="col s12 m1 l1">
            <!-- Dropdown Trigger -->
            <a style="margin-top: 25px" class='dropdown-trigger btn tooltipped' data-position="top" data-delay="50"
               data-tooltip="Modo de visualização" href='#' data-target='dropdown2'><i
                    class="large material-icons">dashboard</i></a>

            <!-- Dropdown Structure -->
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="{{route('exsicatas.index')}}">Tabela</a></li>
                <li><a href="{{route('exsicatas.index-grade')}}">Grade</a></li>
            </ul>
        </div>
        <div class="col s12 m1 l1">
            <a style="margin-top: 25px" class='btn tooltipped' data-position="top" data-delay="50"
               data-tooltip="Gerar etiquetas para todas exsicatas" href='{{route('relatorios-etiquetas')}}' target="_blank"><i
                    class="large material-icons">label</i></a>
        </div>
    </div>
    <ul class="collapsible">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_list</i>Filtros</div>
            <div class="collapsible-body white">
                <form method="POST" action="{{ route('exsicatas.filtrar') }}">
                    <div class="row">
                        <div class="input-field col s6 m4 l3">
                            <input id="coletor" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um coletor..." type="text" name="coletor">
                            <label for="coletor">Coletor</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="cidade" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite uma cidade..." type="text" name="cidade">
                            <label for="cidade">Cidade</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="estado" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um estado..." type="text" name="estado">
                            <label for="estado">Estado</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="determinador" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um determinador..." type="text" name="determinador">
                            <label for="determinador">Determinador</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="epiteto" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um epiteto..." type="text" name="epiteto">
                            <label for="epiteto">Epiteto</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="escaninho" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um escaninho..." type="text" name="escaninho">
                            <label for="escaninho">Escaninho</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="familia" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite uma família..." type="text" name="familia">
                            <label for="familia">Família</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="genero" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um gênero..." type="text" name="genero">
                            <label for="genero">Genero</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="habitat" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um habitat..." type="text" name="habitat">
                            <label for="habitat">Habitat</label>
                        </div>
                        <div class="input-field col s6 m4 l3">
                            <input id="numero" class="tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Digite um número..." type="text" name="numero">
                            <label for="numero">Número</label>
                        </div>
                        <div class="input-field col s1 m1 l1">
                            <button type="submit" class="btn-floating tooltipped" data-position="top" data-delay="50"
                                    data-tooltip="Clique aqui para pesquisar"><i class="material-icons">search</i>
                            </button>
                        </div>
                        {{csrf_field()}}
                    </div>
                </form>

            </div>
        </li>
    </ul>
    @if($table)
        <div class="card-panel">
            <table class="centered responsive-table highlight bordered">
                <thead>
                <tr>
                    <th>Espécime</th>
                    <th>Coletor</th>
                    <th>Localização</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $exsicata)
                    <tr>
                        <td>
                            <a href="{{route('exsicatas.show', $exsicata->id)}}">{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</a>
                        </td>
                        <td>{{$exsicata->coletor}}, {{$exsicata->data}}</td>
                        <td><strong>{{$exsicata->endereco->municipio}}</strong>. {{$exsicata->endereco->local}}
                        </td>
                        <td width="17%"><img class="materialboxed"
                                             data-caption="Foto da exsicata {{$exsicata->genero->name}} {{$exsicata->epiteto->name}}"
                                             width="150" width="300"
                                             src="{{$exsicata->image}}">
                        </td>
                        <td>
                            @ability('admin,gerenciador,moderador', '')
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('exsicatas.edit', $exsicata->id)}}"> <i
                                    class="small material-icons">edit</i></a>
                            <a data-target="modal1" class="modal-trigger tooltipped" data-position="top"
                               data-delay="50"
                               data-tooltip="Deletar" href="#modal1" data-id="{{$exsicata->id}}"
                               data-name="{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}"><i
                                    class="small material-icons">delete</i></a>
                            </br>
                            @endability
                            <a class="modal-trigger tooltipped" data-target="relatoriomodal" data-position="top"
                               data-delay="50" data-tooltip="Relatório" href="#relatoriomodal"
                               data-id="{{$exsicata->id}}"
                               data-name="{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}"><i
                                    class="small material-icons">chrome_reader_mode</i></a>
                            <a class="tooltipped" data-position="top"
                               data-delay="50" data-tooltip="Etiqueta" target="_blank"
                               href="{{route('relatorios-etiqueta', $exsicata->id)}}"><i
                                    class="small material-icons">label_outline</i></a>
                        </td>
                        @empty
                            <td>Nenhuma exsicata cadastrada</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    @else
        <div class="row">
            @foreach($data as $exsicata)
                <div class="col s12 m6 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img width="150" width="300" src="{{$exsicata->image}}">
                        </div>
                        <div class="card-content">
                                        <span
                                            class="card-title">{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</span>
                            <p>{{$exsicata->coletor}}, {{$exsicata->data}}</p>
                            <p>
                                <strong>{{$exsicata->endereco->municipio}}</strong>. {{$exsicata->endereco->local}}
                            </p>
                        </div>
                        <div class="card-action">
                            <a class="btn tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Acessar" href="{{route('exsicatas.show', $exsicata->id)}}"><i
                                    class="small material-icons">web</i></a>
                            <a class="modal-trigger btn tooltipped" data-target="relatoriomodal" data-position="top"
                               data-delay="50" data-tooltip="Relatório" href="#relatoriomodal"
                               data-id="{{$exsicata->id}}"
                               data-name="{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}"><i
                                    class="small material-icons">chrome_reader_mode</i></a>
                            @ability('admin,gerenciador,moderador', '')
                            <a class="btn tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('exsicatas.edit', $exsicata->id)}}"><i
                                    class="small material-icons">edit</i></a>
                            <a class="btn modal-trigger tooltipped" data-target="modal1" data-position="top"
                               data-delay="50"
                               data-tooltip="Deletar" href="#modal1" data-id="{{$exsicata->id}}"
                               data-name="{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}"><i
                                    class="small material-icons">delete</i></a>
                            @endability
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <div class="section">
        {{$data->links()}}
    </div>
    @ability('admin,gerenciador,moderador,coletor', '')
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large" href="{{route('exsicatas.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
    @endability

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
