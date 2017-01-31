@extends('main')
@section('title',"| Maquina $maquina->name")
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{$maquina->name}}</h1>
            <p class="lead">{{$maquina->ip}}</p>
            <h4>Administradores de la Máquina</h4>
            <div class="tags">
                @foreach($maquina->users as $admin)
                    <span class="label label-default">{{$admin->name}}</span>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('maquinas.edit','Editar',array($maquina->id),array('class'=>'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {{ Form::open(['route' => ['maquinas.destroy',$maquina->id],'method'=>'DELETE']) }}
                    {!! Form::submit('Eliminar',['class'=>'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        {!! Html::linkRoute('maquinas.index','<< Ver Todas Las Maquinas',[],array('class'=>'btn btn-default btn-block btn-h1-spacing')) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection