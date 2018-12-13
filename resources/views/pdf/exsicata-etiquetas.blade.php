<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Exsicatas</title>
</head>

<body>
<table style="width:100%">
    @foreach($exsicatas as $exsicata)
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td>{{$exsicata->bdd}}  {{$exsicata->numero}}</td>
            <td><p style="float:right">{{$exsicata->familia->name}}</p></td>
            <td rowspan="7"><img width="540" height="540"
                                 src="{{public_path(str_after($exsicata->qrcode, 'https://herbario.saoleopoldo.rs.gov.br/'))}}"
                                 style="float:right"></td>
        </tr>
        <tr>
            <td>{{$exsicata->genero->name}}  {{$exsicata->epiteto->name}} {{$exsicata->autor}}</td>
        </tr>
        <tr>
            <td>@if($exsicata->name == "") Sem nome vulgar @else{{$exsicata->name}}@endif</td>
        </tr>
        <tr>
            <td>{{$exsicata->endereco->uf}}, {{$exsicata->endereco->municipio}}, {{$exsicata->endereco->local}}</td>
        </tr>
        <tr>
            <td>Coletor: {{$exsicata->coletor}}</td>
            <td><p style="float:right">{{$exsicata->data}}</p></td>
        </tr>
        <tr>
            <td>Determinador: {{$exsicata->determinador}}</td>
        </tr>
        <tr>
            <td>Coordenadas: {{$exsicata->endereco->latitude}} {{$exsicata->endereco->longitude}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>

