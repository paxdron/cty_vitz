@extends('main')
@section('title','| Registar Nueva Máquina')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <h1>Registrar Maquina</h1>
                {!! Form::open(array('route' => 'maquinas.store','data-parsley-validate'=>'')) !!}
                {{  Form::label('title','Nombre de Máquina:') }}
                {{  Form::Text('name',null,array('class'=>'form-control','required'=>'','maxlength'=>'128')) }}
                {{  Form::label('ip','Direccion IP:') }}
                {{  Form::Text('ip', null, array('class'=>'form-control','required'=>'','maxlength'=>'45'))}}
                {{  Form::submit('Registrar Máquina',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px'))}}
                {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection