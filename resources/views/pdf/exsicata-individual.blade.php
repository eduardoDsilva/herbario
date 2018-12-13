<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Exsicata {{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .pmsl {
            float: left;
        }

        .herbario {
            float: right;
        }


        .header {
            width: 100%;
            height: 320px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="header">
    <img src="{{public_path('images/LOGO_PMSL.png')}}" class="pmsl">

    <img src="{{public_path('images/logo_herbario.jpg')}}" style="float:right">

</div>
@if(in_array('dados_da_exsicata', $campos))
    <h2>Dados da Exsicata</h2>
    <hr>
@endif
<ul>
    @if(in_array('determinacao', $campos))
        <li>Determinação: {{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</li>
    @endif
    @if(in_array('genero', $campos))
        <li>Gênero: {{$exsicata->genero->name}}</li>
    @endif
    @if(in_array('epiteto', $campos))
        <li>Epíteto: {{$exsicata->epiteto->name}}</li>
    @endif
    @if(in_array('familia', $campos))
        <li>Família: {{$exsicata->familia->name}}</li>
    @endif
    @if(in_array('nome', $campos))
        <li>Nome vulgar: {{$exsicata->name}}</li>
    @endif
    @if(in_array('numero', $campos))
        <li>Número: {{$exsicata->numero}}</li>
    @endif
    @if(in_array('autor', $campos))
        <li>Autor: {{$exsicata->autor}}</li>
    @endif
    @if(in_array('escaninho', $campos))
        <li>Escaninho: {{$exsicata->escaninho}}</li>
    @endif
</ul>

@if(in_array('dados_da_coleta', $campos))
    <h2>Dados da coleta</h2>
    <hr>
@endif
<ul>
    @if(in_array('coletor', $campos))
        <li>Coletor: {{$exsicata->coletor}}</li>
    @endif
    @if(in_array('data', $campos))
        <li>Data: {{$exsicata->data}}</li>
    @endif
    @if(in_array('determinador', $campos))
        <li>Determinador: {{$exsicata->determinador}}</li>
    @endif
    @if(in_array('quantidade', $campos))
        <li>Quantidade: {{$exsicata->quantidade}}</li>
    @endif
    @if(in_array('bdd', $campos))
        <li>BDD: {{$exsicata->bdd}}</li>
    @endif
</ul>

@if(in_array('localizacao', $campos))
    <h2>Localização</h2>
    <hr>
@endif
<ul>
    @if(in_array('municipio', $campos))
        <li>Municipio: {{$exsicata->endereco->municipio}}</li>
    @endif
    @if(in_array('uf', $campos))
        <li>UF: {{$exsicata->endereco->uf}}</li>
    @endif
    @if(in_array('pais', $campos))
        <li>País: {{$exsicata->endereco->pais}}</li>
    @endif
    @if(in_array('local', $campos))
        <li>Local: {{$exsicata->endereco->local}}</li>
    @endif
    @if(in_array('latitude', $campos))
        <li>Latitude: {{$exsicata->endereco->latitude}}</li>
    @endif
    @if(in_array('longitude', $campos))
        <li>Longitude: {{$exsicata->endereco->longitude}}</li>
    @endif
    @if(in_array('habitat', $campos))
        <li>Habitat: {{$exsicata->endereco->habitat}}</li>
    @endif
    @if(in_array('observacao', $campos))
        <li>Observação: {{$exsicata->endereco->observacao}}</li>
    @endif
</ul>

<img width="540" height="540"
     src="{{public_path(str_after($exsicata->qrcode, 'https://herbario.saoleopoldo.rs.gov.br/'))}}" style="float:right">

</body>
</html>
