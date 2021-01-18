@extends ('layout.admin')
@section ('Contenido')
    <div class="row" style="margin-top: -15px;">
        <div class="cabecera">
            <i class="fa fa-plus" aria-hidden="true"
            style="margin-right: 10px"></i>
            Agregar nuevo Usuario
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
            {!!Form::open(array('url'=>'acceso/usuario', 'method'=>'POST', 'autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}
    <div class="row" id="formulario">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="NumDocumento">N° DOCUMENTO</label>
                <input type="text" name="NumDocumento"
                required value="{{old('NumDocumento')}}" class="form-control"
                placeholder="Ingrese el Nro de Documento de Identidad">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Nombre">NOMBRES </label>
                <input type="text" name="Nombre" required
                class="form-control" value="{{old('Nombre')}}"
                 placeholder="Ingrese los Nombres del Usuario">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Apellido">APELLIDOS </label>
                <input type="text" name="Apellido" required
                class="form-control" value="{{old('Apellido')}}"
                 placeholder="Ingrese los Apellidos del Usuario">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Celular">CELULAR</label>
                <input type="text" name="Celular" required
                class="form-control" value="{{old('Celular')}}"
                placeholder="Ingrese el Nro de Celular">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="email">CORREO ELECTRÓNICO</label>
                <input type="email" name="email" class="form-control"
                value="{{old('email')}}" placeholder="Ingrese el correo electrónico del Usuario.">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group fg" id="grupo__password">
                <label for="password">CONTRASEÑA</label>
                <div class="formulario__grupo-input">
                    <input type="password" name="password" id="password"
                    class="form-control"
                    value="{{old('password')}}">
                    <i class="formulario__validacion-estado fa fa-times-circle" ></i>
                    
                </div>
                <p class="formulario__input-error">
                La contraseña tiene que ser de 4 a 12 digitos.
                </p>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group fg" id="grupo__password2">
                <label for="password2">REPETIR CONTRASEÑA</label>
                <div class="formulario__grupo-input">
                    <input type="password" name="password2" id="password2"
                    class="form-control fi"
                    value="{{old('password')}}">
                    <i class="formulario__validacion-estado fa fa-times-circle" ></i>
                </div>
                <p class="formulario__input-error">
                Ambas contraseñas deben ser iguales.
                </p>
            </div>
        </div>

        <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{asset('acceso/usuario')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>

    {!!Form::close()!!}

@endsection
