@extends('layout.admin')
@Section ('Contenido')
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
        <i class="fa fa-archive" style="padding-right: 1em "></i>
        Agregando nueva Categoría de Producto
    </div>
</div>
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			@if (count($errors)>0)
			<div class="alert alert-danger" role="alert">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Denominacion">Denominación</label>
            	<input type="text" name="Denominacion" class="form-control"
				value= "{{old('Denominacion')}}"
				placeholder="Ingrese la denominación de la Categoría de Producto.">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<!-- <button class="btn btn-danger" type="reset">Cancelar</button> -->
				<a href="{{asset('almacen/categoria')}}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}

		</div>
	</div>
@endsection
