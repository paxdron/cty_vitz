@extends('main')
@section('title',"| Iniciar Sesión")

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Iniciar Sesión</div>
            <div class="panel-body">
                {!! Form::open() !!}
                {{  Form::label('email','Correo:')}}
                {{  Form::email('email',old('email'),['class'=>'form-control','required'=>'','autofocus'=>''])}}
                {{  Form::label('password','Password:',['class'=>'form-spacing-top'])}}
                {{  Form::password('password',['class'=>'form-control','required'=>'']) }}
                <br>
                <div class="col-md-6 col-md-offset-4">
                    {{  Form::checkbox('remember')}}{{  Form::label('remember',' Recordarme')}}
                </div>
                <br><br>
                    {{  Form::submit('Iniciar Sesión',['class'=>'btn btn-primary btn-block'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
