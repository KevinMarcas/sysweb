@extends('layout.admin')
@Section ('Contenido')
    <div class="row" style="margin-top: -15px;">
        <div class="cabecera">
            <i  aria-hidden="true" style="padding-right: 1em"></i>
            Agregando Nuevo Tipo de Habitación
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open(['url' => 'mantenimiento/tipo_habitacion', 'method' => 'POST', 'autocomplete' => 'off']) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Denominacion">Denominación</label>
                <input type="text" name="Denominacion" class="form-control"
                placeholder="Ingrese el nombre del Tipo de Habitación."
                value="{{old('Denominacion')}}">
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripción</label>
                <input type="text" name="Descripcion" class="form-control"
                value="{{old('Descripcion')}}"
                placeholder="Puede describir brevemente las caracteristicas de este tipo de habitación.">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{asset('mantenimiento/tipo_habitacion')}}" class="btn btn-danger">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
