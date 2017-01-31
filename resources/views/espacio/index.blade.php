@extends('main')
@section('title','| Espacios ')

@section('content')
    <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
        <div class="row">
            <div class="col-md-8">
                <h1>Espacios</h1>
            </div>
                <div class="col-md-4 center-block">
                    <a href="{{route('espacios.create')}}" class="btn btn-primary btn-block btn-h1-spacing">Asignar Espacio a Usuario</a>
                </div>
        </div>
        <div class="row">
            @foreach($maquinas as $maquina)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{$maquina->name}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#col{{$maquina->name}}" aria-expanded="false" aria-controls="col{{$maquina}}">
                                    {{$maquina->name}}
                                </a>
                            </h4>
                        </div>
                        <div id="col{{$maquina->name}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$maquina->name}}">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <th>Usuario</th>
                                    <th>Fecha Inicio</th>
                                    <th>Periodos</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($maquina->espacios as $espacio)
                                        <tr>
                                            <td>{{$espacio->user}}</td>
                                            <td>{{$espacio->inicio}}</td>
                                            <td>{{$espacio->periodos}}</td>
                                            <td >
                                                <a href="{{route('espacios.edit',$espacio->id)}}" class="btn btn-default btn-block">Editar</a>
                                                {{ Form::open(['route' => ['espacios.destroy',$espacio->id],'method'=>'DELETE']) }}
                                                {!! Form::submit('Quitar Espacio',['class'=>'btn btn-danger btn-block']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
@stop
