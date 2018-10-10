@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="section">
            <h2>Herbário Virtual</h2>
            <div class="divider"></div>
        </div>
        <div class="section">
            <nav class="green darken-2">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{route('home')}}" class="breadcrumb">Home</a>
                        <a href="{{route('herbario')}}" class="breadcrumb">Herbário Virtual</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card z-depth-5">
            <div class="row">
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('exsicatas.index')}}">
                        <div class="card small green darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Exsicatas</span>
                                <div class="divider"></div>
                                <p>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('familias.index')}}">
                        <div class="card small light-green darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Famílias</span>
                                <div class="divider"></div>
                                <p></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('epitetos.index')}}">
                        <div class="card small teal darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Epitetos</span>
                                <div class="divider"></div>
                                <p></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s12 m6 l6 hoverable">
                    <a href="{{route('generos.index')}}">
                        <div class="card small green darken-4">
                            <div class="card-content white-text">
                                <span class="card-title">Gêneros</span>
                                <div class="divider"></div>
                                <p></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection