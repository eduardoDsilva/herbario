@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m6 push-m3">
                <div class="card" style="padding: 10px">
                    <h2 class="center-align">Login</h2>
                    <div class="row">
                        <form class="col s12" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="identity" id="identity" type="text" class="validate">
                                    <label for="identity">Email ou usuário</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="password" id="password" type="password" class="validate">
                                    <label for="password">Senha</label>
                                </div>
                            </div>
                            {!! Form::captcha() !!}
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col m12">
                                    <p class="right-align">
                                        <button class="btn btn-large waves-effect waves-light" type="submit"
                                                name="action">
                                            Login
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
