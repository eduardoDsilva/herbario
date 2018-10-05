@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Epitetos</h3>
        <div class="divider"></div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="" class="breadcrumb">Herbário Virtual</a>
                        <a href="{{route('epitetos.index')}}" class="breadcrumb">Epitetos</a>
                    </div>
                </div>
            </nav>
        </div>
        <h4>Mostrando 1 - 10 de {{$epitetos->total()}} epitetos</h4>
        <div class="divider"></div>
        <div class="card">
            <table class="centered responsive-table highlight bordered">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade de Exsicatas</th>
                    <th>Exsicatas</th>
                    @ability('admin,gerenciador,moderador', '')
                    <th>Ações</th>
                    @endability
                </tr>
                </thead>
                <tbody>
                @forelse($epitetos as $epiteto)
                    <tr>
                        <td>{{$epiteto->name}}</td>
                        <td>{{count($epiteto->exsicata)}}</td>
                        <td><a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Exsicatas" href="{{route('epitetos.show', $epiteto->id)}}">Exsicatas deste epíteto</a></td>
                        <td>
                            @ability('admin,gerenciador,moderador', '')
                            <a class="modal-trigger tooltipped" data-position="top" data-delay="50"
                               data-tooltip="Editar" href="{{route('epitetos.edit', $epiteto->id)}}"> <i
                                        class="small material-icons">edit</i></a>
                            @endability
                        </td>
                        @empty
                            <td>Nenhum epiteto cadastrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="section">
                {{$epitetos->links()}}
            </div>
        </div>
        @ability('admin,gerenciador,moderador', '')
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red" href="{{route('epitetos.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
        @endability
    </div>

@endsection