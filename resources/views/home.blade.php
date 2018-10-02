@extends('layouts.app')

@section('content')
    <div class="container">
        <p>
            @auth
                You are logged in!
            @else
                Não logado
            @endauth
        </p>
    </div>
@endsection
