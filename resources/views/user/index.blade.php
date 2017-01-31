@extends('main')
@section('title','| Usuarios ')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Usuarios</h1>
        </div>
        <div class="col-md-4 center-block">
            <a href="{{route('register')}}" class="btn btn-primary btn-block btn-h1-spacing">Registrar Usuario Nuevo</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>Nombre</th>
                <th>email</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <!--<td>
                            <a href="{{route('users.show',$user->id)}}" class="btn btn-default btn-sm">Ver</a>
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-default btn-sm">Editar</a>
                        </td>-->
                        <td>
                            {{ Form::open(['route' => ['users.destroy',$user->id],'method'=>'DELETE']) }}
                            {!! Form::submit('Eliminar',['class'=>'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@stop
