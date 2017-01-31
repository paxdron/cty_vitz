@extends('main')
@section('title','| Editar Máquina')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
    <div class="row">
        {!! Form::model($maquina,['route' => ['maquinas.update',$maquina->id],'data-parsley-validate'=>'','method'=>'PUT']) !!}
        <div class="col-md-8">
            {{  Form::label('title','Nombre de Máquina:') }}
            {{  Form::Text('name',null,['class'=>'form-control input-lg','required'=>'','maxlength'=>'128'])}}
            {{  Form::label('ip','Direccion IP:',['class'=>'form-spacing-top']) }}
            {{  Form::Text('ip',null,['class'=>'form-control input-lg','required'=>'','maxlength'=>'45'])}}
            {{  Form::label('admins','Seleccionar Admin:',[]) }}
            {{  Form::select('admins[]',$admins,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}


        </div>

        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        {!!  Html::linkRoute('maquinas.show','Cancel',array($maquina->id),array('class'=>'btn btn-danger btn-block'))!!}
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
        $('.select2-multi').select2().val({!! json_encode($maquina->users()->getRelatedIds()) !!}).trigger("change");
    </script>
@endsection