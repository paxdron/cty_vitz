@extends('main')
@section('title','| Editar Publicidad')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
    <div class="row">
        {!! Form::model($publicidad,['route' => ['publicidad.update',$publicidad->id],'data-parsley-validate'=>'','method'=>'PUT']) !!}
        <div class="col-md-8">
                <h1>Editar Publicidad</h1>
                {{  Form::label('title','Nombre de la Publicidad:') }}
                {{  Form::Text('name',null,array('class'=>'form-control','required'=>'','maxlength'=>'128')) }}
                {{  Form::label('espacios','Seleccionar Espacios:',[]) }}
                {{  Form::select('espacios[]',$espacios,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}


        </div>
        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        {!!  Html::linkRoute('publicidad.index','Cancel',array($publicidad->id),array('class'=>'btn btn-danger btn-block'))!!}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Guardar Cambios',['class'=>'btn btn-success btn-block'])}}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($publicidad->espacios()->getRelatedIds()) !!}).trigger("change");
    </script>
@endsection