@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-5 col-md-offset-5" style="margin-left:auto; margin-right:auto;">
            <div class="card">
                <div class="card-header p-3 mb-2 bg-primary text-white" style="text-align: center">
                    SISTEMA DE GESTIÓN HOTELERA BARABENTO 2021
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login')}}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
                            <label for="">Email</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input class="form-control"
                             name="email"
                             placeholder="Ingrese su Email"
                             value= "{{old ('email')}}">
                            </div>

                            {!! $errors->first('email', '<span class="help-block text-danger">:message </span>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                            <input class="form-control"
                             type="password" name="password"
                             placeholder="Ingrese su Contraseña">

                            </div>
                            {!! $errors->first('password', '<span class="help-block text-danger">:message </span>') !!}
                        </div>
                        <button class="btn btn-success btn-block">Acceder</button>

                    </form>
                </div>
                <div class="card-footer p-3 mb-2 bg-primary text-white" style="text-align: center">
                    <a href="" style="text-decoration: none; color:white">Olvidé mi contraseña</a>
                </div>
            </div>
        </div>
    </div>
@endsection
