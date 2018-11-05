<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {!! MaterializeCSS::include_all() !!}

    <link href="{{ asset('css/herbario.css') }}" rel="stylesheet">

    <script src="{{ asset('js/herbario.js') }}"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" media="screen">

    <script type="text/javascript" src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/imgViewer2.min.js') }}"></script>

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
                <a href="{{route('home')}}" class="brand-logo">Jardim Botânico</a>
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
@yield('script')
<script>
    $("#crud-table").click(function (e) {
        e.preventDefault();
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: form_action,
        }).done(function (data) {
            M.toast({html: data.name+' criado com sucesso!'});
        });
    });

    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });
    });

    $(function() {
        $.ajax({
            dataType: 'json',
            type: 'GET',
            url: '/epiteto-tabela',
        }).done(function (data) {
            $(data[53].exsicata).each(function(index) {
                console.log('Epiteto: '+data[53].name);
                console.log('Exsicata: '+data[53].exsicata[index].name);
            });
       });
    });

    $(document).on('click', '.modal-trigger', function () {
        $('#id-edit').val($(this).data('id'));
        $('#id-delete').val($(this).data('id'));
        $('#name-edit').val($(this).data('name'));
        $('#name-delete').val($(this).data('name'));
    });

    $("#crud-store").click(function (e) {
        e.preventDefault();
        var form_action = $("#create-item").find("form").attr("action");
        var name = $("#create-item").find("input[name='name']").val();
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: form_action,
            data: {name: name}
        }).done(function (data) {
            M.toast({html: data.name+' criado com sucesso!'});
        });
    });

    $("#crud-update").click(function (e) {
        e.preventDefault();
        var form_action = $("#edit-item").find("form").attr("action");
        var id = $("#edit-item").find("input[name='id']").val();
        var name = $("#edit-item").find("input[name='name']").val();
        $.ajax({
            dataType: 'json',
            type: 'PUT',
            url: form_action,
            data: {id: id, name: name}
        }).done(function (data) {
            M.toast({html: data.name+' atualizado com sucesso!'});
        });
    });

    $("#crud-delete").click(function (e) {
        e.preventDefault();
        var form_action = $("#delete-item").find("form").attr("action");
        var id = $("#delete-item").find("input[name='id']").val();
       $.ajax({
            dataType: 'json',
            type: 'DELETE',
            url: form_action,
            data: {id: id}
        }).done(function () {
            M.toast({html:  'Deletado com sucesso!'});
        });
    });
</script>
</body>
</html>
