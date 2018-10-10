@extends('layouts.app')

@section('titulo', 'Epitetos')
@section('breadcrumb')
    <a href="{{route('home')}}" class="breadcrumb">Home</a>
    <a href="{{route('configurations.index')}}" class="breadcrumb">Configurações</a>
    <a href="{{route('audits.index')}}" class="breadcrumb">Auditoria</a>
@endsection
@section('content')
    @include('layouts._breadcrumb')
    @include('layouts._quantidade-de-registros')

    @ability('admin,gerenciador,moderador', '')
    <div class="divider"></div>
    <div class="card">
        <table class="centered responsive-table highlight bordered">
            <thead>
            <tr>
                <th>Evento</th>
                <th>Descricao</th>
                <th>Tipo</th>
                <th>Responsável</th>
                <th>Data/hora</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $audit)
                <tr>
                    <td>{{$audit->event}}</td>
                    <td>
                        @if($audit->new_values == '[]')
                            @if(starts_with($audit->old_values, '{"password"') || starts_with($audit->old_values, '{"remember_token"'))
                                {{ str_limit(str_replace(',',', ', $audit->old_values), 30) }}
                            @else{{ str_limit(str_replace(',',', ', $audit->old_values), 125) }}
                            @endif
                        @else
                            @if(starts_with($audit->new_values, '{"password"') || starts_with($audit->old_values, '{"remember_token"'))
                                {{str_limit(str_replace(',',', ', $audit->new_values), 30)}}
                            @else{{ str_limit(str_replace(',',', ', $audit->new_values), 125) }}
                            @endif
                        @endif</td>
                    <td>{{$audit->auditable_type}}</td>
                    <td>{{\App\User::find($audit->user_id)->username}}</td>
                    <td>{{ date('d-m-Y H:i:s', strtotime($audit->created_at)) }}</td>
                    @empty
                        <td>Nenhum registro encontrado</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="section">
            {{$data->links()}}
        </div>
    </div>
    @endability
    </div>

@endsection