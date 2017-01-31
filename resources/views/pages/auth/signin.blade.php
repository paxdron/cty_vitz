@extends('main')
@section('title','| Iniciar Sesión')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Iniciar Sesión</div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="mail">Correo</label>
                            <input type="email" name="mail" id="mail" placeholder="you@domain.com" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection