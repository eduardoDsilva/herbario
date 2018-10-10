@extends('layouts.app')

@section('titulo', 'Exsicatas')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
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
    <div class="card z-depth-2">
        @if($table)
            <table class="centered responsive-table highlight bordered">
                <thead>
                <tr>
                    <th>Espécime</th>
                    <th>Coletor</th>
                    <th>Localização</th>
                    <th>Imagem</th>
                    @ability('admin,gerenciador,moderador', '')
                    <th>Ações</th>
                    @endability
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
                        @ability('admin,gerenciador,moderador', '')
                        <td>
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('exsicatas.edit', $exsicata->id)}}"> <i
                                        class="small material-icons">edit</i></a>
                        </td>
                        @endability
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
                                <a class="btn" href="{{route('exsicatas.show', $exsicata->id)}}">Acessar</a>
                                @ability('admin,gerenciador,moderador', '')
                                <a class="btn" href="{{route('exsicatas.edit', $exsicata->id)}}">Editar</a>
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
        <a class="btn-floating btn-large red" href="{{route('exsicatas.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
    @endability
    </div>

@endsection