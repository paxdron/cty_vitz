@extends('main')
@section('title','| Mi Publicidad ')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Mi Publicidad</h1>
        </div>
        <div class="col-md-4 center-block">
            <a href="{{route('publicidad.create')}}" class="btn btn-primary btn-block btn-h1-spacing">Agregar Nueva Publicidad</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Nombre</th>
                <th>Maquinas</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($publicidads as $publicidad)
                    <tr>
                        <td>{{$publicidad->name}}</td>
                        <td>
                            @foreach($publicidad->espacios as $espacio)
                                <span class="label label-default">{{$espacio->maquina->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{storage_path('app/publicidad/'.$publicidad->name_file)}}" class="btn btn-default btn-sm">Descargar</a>
                            <a href="{{route('publicidad.edit',$publicidad->id)}}" class="btn btn-default btn-sm">Editar</a>
                        </td>
                        <td>
                            {{ Form::open(['route' => ['publicidad.destroy',$publicidad->id],'method'=>'DELETE']) }}
                            {!! Form::submit('Eliminar',['class'=>'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $publicidads->links() !!}
            </div>
        </div>
    </div>
@stop
