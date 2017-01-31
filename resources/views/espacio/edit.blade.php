@extends('main')
@section('title','| Editar Espacio')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::style('css/jquery.bootstrap-touchspin.min.css') !!}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-offset-1 col-xs-10">
            <h1>Editar Espacio</h1>
            {!! Form::model($espacio,['route' => ['espacios.update',$espacio->id],'data-parsley-validate'=>'', 'method' => 'PUT']) !!}
            {{  Form::label('user_id','Usuario:') }}
            {{  Form::select('user_id', $users, null, ['class' => 'form-control']) }}
            <br>
            {{  Form::label('maquina_id','Maquina:') }}
            {{  Form::select('maquina_id',$maquinas,null,['class'=>'form-control select2-single'])}}<br>
            <div class="row">
                <div class="col-md-6">
                    {{  Form::label('inicio','Fecha Inicio:') }}

                    <div class="input-group input-append date" id="datePicker">
                        {{  Form::Text('inicio',null,['class'=>'form-control','required'=>'', 'name'=>'inicio' ])}}
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <div class="col-md-6">
                    {{  Form::label('periodos','Numero de Periodos:') }}
                    {{  Form::Text('periodos',null,['required'=>'', 'name'=>'periodos' ])}}

                </div>
            </div>
            <div class="row" >
                <div class="col-md-4 col-md-offset-1 col-xs-12">
                    {{  Form::submit('Aceptar',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}
                </div>
                <div class="col-md-4 col-md-offset-1 col-xs-12">
                    <a href="{{route('espacios.index')}}" class="btn btn-danger btn-lg btn-block" style="margin-top: 20px">Cancelar</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/jquery.bootstrap-touchspin.min.js') !!}
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $('.select2-single').select2();
        $('#datePicker')
                .datepicker({
                    format: 'yyyy/mm/dd',
                    autoclose: true,
                });
        $("input[name='periodos']").TouchSpin({
            min: 0,
            max: 100,
        });
    </script>
@endsection