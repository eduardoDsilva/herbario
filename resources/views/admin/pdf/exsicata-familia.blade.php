<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Exsicatas da família {{$familia->name}}</title>

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
        .page-break {
            page-break-after: always;
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
</div>
<h1>Exsicatas da família {{$familia->name}}</h1>
@foreach($exsicatas as $exsicata)
    <h2>Dados da Exsicata</h2>
    <hr>
    <ul>
        <li>Determinação: {{$exsicata->genero->name}} {{$exsicata->epiteto->name}}</li>
        <li>Gênero: {{$exsicata->genero->name}}</li>
        <li>Epíteto: {{$exsicata->epiteto->name}}</li>
        <li>Família: {{$exsicata->familia->name}}</li>
        <li>Nome vulgar: {{$exsicata->name}}</li>
        <li>Número: {{$exsicata->numero}}</li>
        <li>Autor: {{$exsicata->autor}}</li>
        <li>Escaninho: {{$exsicata->escaninho}}</li>
    </ul>

    <h2>Dados da coleta</h2>
    <hr>
    <ul>
        <li>Coletor: {{$exsicata->coletor}}</li>
        <li>Data: {{$exsicata->data}}</li>
        <li>Determinador: {{$exsicata->determinador}}</li>
        <li>Quantidade: {{$exsicata->quantidade}}</li>
        <li>BDD: {{$exsicata->bdd}}</li>
    </ul>

    <h2>Dados do endereço</h2>
    <hr>
    <ul>
        <li>Municipio: {{$exsicata->endereco->municipio}}</li>
        <li>UF: {{$exsicata->endereco->uf}}</li>
        <li>País: {{$exsicata->endereco->pais}}</li>
        <li>Local: {{$exsicata->endereco->local}}</li>
        <li>Latitude: {{$exsicata->endereco->latitude}}</li>
        <li>Longitude: {{$exsicata->endereco->longitude}}</li>
        <li>Habitat: {{$exsicata->endereco->habitat}}</li>
        <li>Observação: {{$exsicata->endereco->observacao}}</li>
    </ul>
    <div class="page-break"></div>
@endforeach
</body>
</html>
