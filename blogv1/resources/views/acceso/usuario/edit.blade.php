@extends ('layout.admin')
@section ('Contenido')
    <div class="row" style="margin-top: -15px;">
        <div class="cabecera">
            <i class="fa fa-pencil-square-o" aria-hidden="true"
            style="margin-right: 10px"></i>
            Editar datos del Usuario
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
    {!!Form::model($usuario,['method'=>'PATCH', 'route'=>['usuario.update', $usuario->IdUsuario]])!!}
    {{Form::token()}}
    <div class="row" id="formulario">
        <input type="hidden" value="{{$usuario->IdUsuario}}">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="NumDocumento">N° DOCUMENTO</label>
                <input type="text" name="NumDocumento"
                required value="{{$usuario->NumDocumento}}" class="form-control"
                placeholder="Ingrese el N° de Documento de Identidad">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Nombre">NOMBRES </label>
                <input type="text" name="Nombre" required
                class="form-control" value="{{$usuario->Nombre}}"
                 placeholder="Ingrese los Nombres del Usuario">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Apellido">APELLIDOS </label>
                <input type="text" name="Apellido" required
                class="form-control" value="{{$usuario->Apellido}}"
                 placeholder="Ingrese los Apellidos del Usuario">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Celular">CELULAR</label>
                <input type="text" name="Celular" required
                class="form-control" value="{{$usuario->Celular}}"
                placeholder="Ingrese el Nro de Celular">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="email">CORREO ELECTRÓNICO</label>
                <input type="email" name="email" class="form-control"
                value="{{$usuario->email}}" placeholder="Ingrese el correo electrónico del Usuario.">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group fg" id="grupo__password">
                <label for="password">CONTRASEÑA</label>
                <div class="formulario__grupo-input">
                    <input type="password" name="password" id="password"
                    class="form-control fi"
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
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-4 col-md-6 col-xs-12">
            <div class="form-group">
                <a href="{{asset('acceso/usuario')}}" class="btn btn-danger btn-block">Cancelar</a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-4 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary btn-block"
                type="submit" id="btnguardar">Modificar Datos</button>
            </div>
        </div>
    </div>

    {!!Form::close()!!}
<script>

const inputs2 = document.querySelectorAll('#password');
const inputs3 = document.querySelectorAll('#password2');
inputs2.forEach((input) => {
        input.addEventListener('keyup', validarClave);
    })
inputs3.forEach((input) => {
        input.addEventListener('keyup', validarClave);
    })
function validarClave (){
    caja = document.getElementById("password").value;
    caja2 = document.getElementById("password2").value;
    if ((caja.length > 0 && caja.length <= 3) || caja !== caja2){
        document.getElementById('btnguardar').style.display = 'none';

    }else{
        document.getElementById('btnguardar').style.display = 'block';
    }
}
</script>
@endsection
