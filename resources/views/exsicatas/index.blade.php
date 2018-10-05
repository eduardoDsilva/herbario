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
                    </div>
                </div>
            </nav>
        </div>
        <h4>Mostrando 1 - 10 de {{$exsicatas->total()}} exsicatas</h4>
        <div class="divider"></div>
        <div class="card">
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
                @forelse($exsicatas as $exsicata)
                    <tr>
                        <td>
                            <a href="{{route('exsicatas.show', $exsicata->id)}}">{{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</a>
                        </td>
                        <td>{{$exsicata->coletor}}, {{$exsicata->data}}</td>
                        <td><strong>{{$exsicata->endereco->municipio}}</strong>. {{$exsicata->endereco->local}}</td>
                        <td width="17%"><img class="materialboxed" data-caption="A picture of a way with a group of trees in a park" width="150" width="300" src="https://materializecss.com/images/sample-1.jpg">
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