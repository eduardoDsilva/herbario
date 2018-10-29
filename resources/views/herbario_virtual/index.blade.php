@extends('layouts.app')

@section('titulo', 'Herbário Virtual')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
@endsection
@section('content')
        @include('layouts._breadcrumb')
        <div class="card z-depth-5">
            <div class="row">
                <div class="col s12 m6 l3 hoverable">
                    <a href="{{route('exsicatas.index')}}">
                        <div class="card small green darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Exsicatas</span>
                                <div class="divider"></div>
                                <p>Clique para visualizar as Exsicatas do sistema.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3 hoverable">
                    <a href="{{route('familias.index')}}">
                        <div class="card small light-green darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Famílias</span>
                                <div class="divider"></div>
                                <p>Clique para visualizar as Famílias do sistema.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3 hoverable">
                    <a href="{{route('epitetos.index')}}">
                        <div class="card small teal darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Epitetos</span>
                                <div class="divider"></div>
                                <p>Clique para visualizar os Epitetos do sistema.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l3 hoverable">
                    <a href="{{route('generos.index')}}">
                        <div class="card small green darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Gêneros</span>
                                <div class="divider"></div>
                                <p>Clique para visualizar os Gêneros do sistema.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
