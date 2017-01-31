@extends('main')
@section('title','| Máquinas ')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Máquinas</h1>
        </div>
            @if(Auth::user()->isSuperAdmin())
                <div class="col-md-4 center-block">
                    <a href="{{route('maquinas.create')}}" class="btn btn-primary btn-block btn-h1-spacing">Registrar Máquina Nueva</a>
                </div>
            @endif
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Nombre</th>
                <th>IP</th>
                </thead>
                <tbody>
                @foreach($maquinas as $maquina)
                    <tr>
                        <td>{{$maquina->name}}</td>
                        <td>{{$maquina->ip}}</td>
                        @if(Auth::user()->isSuperAdmin())
                            <td>
                                <a href="{{route('maquinas.show',$maquina->id)}}" class="btn btn-default btn-sm">Ver</a>
                                <a href="{{route('maquinas.edit',$maquina->id)}}" class="btn btn-default btn-sm">Editar</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $maquinas->links() !!}
            </div>
        </div>
    </div>
@stop
