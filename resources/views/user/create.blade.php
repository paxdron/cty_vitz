@extends('main')
@section('title','| Registar Nuevo Usuario')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <h1>Registrar Usuario</h1>
                {!! Form::open(array('route' => 'users.store','data-parsley-validate'=>'')) !!}
                {{  Form::label('title','Nombre de Usuario:') }}
                {{  Form::Text('name',null,array('class'=>'form-control','required'=>'','maxlength'=>'128','data-parsley-type'=>'alphanum')) }}
                {{  Form::label('email','Email:') }}
                {{  Form::email('email', null, array('class'=>'form-control','required'=>'','maxlength'=>'128'))}}
                {{  Form::label('password','Password:') }}
                {{  Form::password('password', array('class' => 'form-control','required'=>'','maxlength'=>'128'))}}
                {{  Form::submit('Registrar Usuario',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px'))}}
                {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection