@extends('layouts.app')

@section('titulo', 'Exsicatas')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('exsicatas.index')}}" class="breadcrumb">Exsicatas</a>
@endsection
@section('content')

    @include('layouts._breadcrumb')
    <div class="row">
        <div class="col s12 m11 l11">
            @include('layouts._quantidade-de-registros')
        </div>
        <div class="col s12 m1 l1">
            <!-- Dropdown Trigger -->
            <a style="margin-top: 25px" class='dropdown-trigger btn' href='#' data-target='dropdown2'><i
                    class="large material-icons">dashboard</i></a>

            <!-- Dropdown Structure -->
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="{{route('exsicatas.index')}}">Tabela</a></li>
                <li><a href="{{route('exsicatas.index-grade')}}">Grade</a></li>
            </ul>
        </div>
    </div>
    <div class="divider"></div>
    <div class="card-panel">
        <div class="row">
            <form method="POST" action="{{ route('exsicatas.filtrar') }}">
                <div class="input-field col s12 m12 l4">
                    <select required name="tipo">
                        <option value="" disabled selected>Filtrar por...</option>
                        <option value="bdd">BDD</option>
                        <option value="coletor">Coletor</option>
                        <option value="cidade">Cidade</option>
                        <option value="estado">Estado</option>
                        <option value="determinador">Determinador</option>
                        <option value="epiteto">Epíteto</option>
                        <option value="escaninho">Escaninho</option>
                        <option value="familia">Família</option>
                        <option value="genero">Genero</option>
                        <option value="habitat">Habitat</option>
                        <option value="local">Local</option>
                        <option value="numero">Número</option>
                        <option value="pais">País</option>
                    </select>
                    <label>Filtros</label>
                </div>
                <div class="input-field col s10 m11 l7">
                    <input id="search" class="tooltipped" data-position="top" data-delay="50"
                           data-tooltip="Insira um complemento para a pesquisa" type="text" name="search" required>
                    <label for="search">Pesquise no sistema...</label>
                </div>
                {{csrf_field()}}
                <div class="input-field col s1 m1 l1">
                    <button type="submit" class="btn-floating tooltipped" data-position="top" data-delay="50"
                            data-tooltip="Clique aqui para pesquisar"><i class="material-icons">search</i></button>
                </div>
            </form>
        </div>
        @if($table)
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
                        <td><strong>{{$exsicata->endereco->municipio}}</strong>. {{$exsicata->endereco->local}}</td>
                        <td width="17%"><img class="materialboxed"
                                             data-caption="Foto da exsicata {{$exsicata->genero->name}} {{$exsicata->epiteto->name}}"
                                             width="150" width="300"
                                             src="https://materializecss.com/images/sample-1.jpg">
                        </td>
                        <td>
                            @ability('admin,gerenciador,moderador', '')
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('exsicatas.edit', $exsicata->id)}}"> <i
                                    class="small material-icons">edit</i></a>
                            <a data-target="modal1" class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Deletar" href="#modal1" data-id="{{$exsicata->id}}"
                               data-name="{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}"><i
                                    class="small material-icons">delete</i></a>
                            @endability
                            <a class="tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Relatório" target="_blank"
                               href="{{route('relatorios-exsicata', $exsicata->id)}}"><i
                                    class="small material-icons">chrome_reader_mode</i></a>
                        </td>
                        @empty
                            <td>Nenhuma exsicata cadastrada</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        @else
            <div class="row">
                @foreach($data as $exsicata)
                    <div class="col s12 m6 l4">
                        <div class="card large hoverable">
                            <div class="card-image">
                                <img src="https://materializecss.com/images/sample-1.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title">{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</span>
                                <p>{{$exsicata->coletor}}, {{$exsicata->data}}</p>
                                <p>
                                    <strong>{{$exsicata->endereco->municipio}}</strong>. {{$exsicata->endereco->local}}
                                </p>
                            </div>
                            <div class="card-action">
                                <a class="btn tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Acessar" href="{{route('exsicatas.show', $exsicata->id)}}">Acessar</a>
                                <a class="btn tooltipped" data-position="top" data-delay="50"
                                   data-tooltip="Relatório" target="_blank"
                                   href="{{route('relatorios-exsicata', $exsicata->id)}}"><i
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

@endsection
