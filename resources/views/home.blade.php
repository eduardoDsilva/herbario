@extends('layouts.app')

@section('titulo', 'Herbário Virtual')
@section('breadcrumb')
@endsection
@section('content')
    @include('layouts._breadcrumb')
    <div class="card z-depth-5">
        <div class="row">
            <div class="col s12 m6 l6 hoverable">
                <a href="{{route('exsicatas.index')}}">
                    <div class="card small green darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">Exsicatas</span>
                            <div class="divider"></div>
                            <p>Existem: {{$exsicatas}} cadastradas no sistema.</p>
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
                            <p>Existem: {{$familias}} cadastradas no sistema.</p>
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
                            <p>Existem: {{$epitetos}} cadastradas no sistema.</p>
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
                            <p>Existem: {{$generos}} cadastradas no sistema.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
@endsection
