<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>

    {!! MaterializeCSS::include_all() !!}

    <link href="{{ asset('css/herbario.css') }}" rel="stylesheet">

    <script src="{{ asset('js/herbario.js') }}"></script>

    <script src="{{ asset('js/jquery.elevatezoom.js') }}" type="text/javascript"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


</head>
<body>
<header>
    <div class="navbar-fixed">
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="{{route('exsicatas.index')}}">Exsicatas</a></li>
            <li class="divider"></li>
            <li><a href="{{route('epitetos.index')}}">Epitetos</a></li>
            <li><a href="{{route('familias.index')}}">Famílias</a></li>
            <li><a href="{{route('generos.index')}}">Gêneros</a></li>
        </ul>

        <nav class="green green darken-2">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">Jardim Botânico</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Contato</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Herbário Virtual<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                    @auth
                        <li><a href="{{route('configurations.index')}}">Configurações</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{route('login')}}">Login</a>
                        </li>
                    @endauth
                </ul>

                <ul class="sidenav" id="mobile-demo">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="">Sobre</a></li>
                    <li><a href="collapsible.html">Contato</a></li>
                    @auth
                        <li><a href="{{route('configurations.index')}}">Configurações</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                    <li><a href="{{route('exsicatas.index')}}">Exsicatas</a></li>
                    <li><a href="{{route('epitetos.index')}}">Epítetos</a></li>
                    <li><a href="{{route('familias.index')}}">Famílias</a></li>
                    <li><a href="{{route('generos.index')}}">Gêneros</a></li>
                    @auth
                    @else
                        <li>
                            <a href="{{route('login')}}">Login</a>
                        </li>
                    @endauth
                </ul>

            </div>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="page-footer green darken-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                    content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
<script>
M.AutoInit();
</script>
</body>
</html>

