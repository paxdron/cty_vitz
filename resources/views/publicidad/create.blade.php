@extends('main')
@section('title','| Agregar Publicidad')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <h1>Agregar Publicidad</h1>
                {!! Form::open(array('route' => 'publicidad.store','data-parsley-validate'=>'','files'=>true)) !!}
                {{  Form::label('title','Nombre de la Publicidad:') }}
                {{  Form::Text('name',null,array('class'=>'form-control','required'=>'','maxlength'=>'128')) }}
                {{  Form::label('name_file','Seleccionar archivo:') }}
                {{  Form::file('name_file',['class'=>'form-control'])}}
                {{  Form::label('espacios','Seleccionar Espacios:',[]) }}
                {{  Form::select('espacios[]',$espacios,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
                {{  Form::submit('Agregar Publicidad',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px'))}}

                {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection