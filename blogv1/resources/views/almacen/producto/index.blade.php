@extends('layout.admin')
@Section ('Contenido')
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
        <i class="fa fa-shopping-cart" aria-hidden="true" style="padding-right: 1em"></i>
        Registro de Productos
    </div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-8 col-xs-12">
		 <a href="producto/create">
		 <button class="btn btn-success btn-block">Agregar nuevo Producto</button></a>
	</div>
	<div class="col-log-4 col-md-4 col-sm-8 col-xs-12 pull-right" >
		@include('almacen.producto.search')
	</div>
</div>
<br>
<!--<div class="row">
	<div class="col-lg-8 col-md-10 col-sm-8 col-xs-12">
		@include('almacen.producto.search')
	</div>
</div>-->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead class="htable">
					<!-- <th>Id</th> -->
					<th class="bg-primary">NOMBRE DEL PRODUCTO</th>
					<th class="bg-primary">IMAGEN</th>
					<th class="bg-primary">PRECIO</th>
					<th class="bg-primary">DESCRIPCIÓN</th>
					<th class="bg-primary">CATEGORÍA</th>
                    <th class="bg-primary">EDITAR</th>
                    <th class="bg-primary">ELIMINAR</th>
				</thead>
               @foreach ($Producto as $pro)
				<tr>
					<!-- <td>{{$pro->IdProducto}}</td> -->
					<td>{{$pro->NombProducto}}</td>
                    <td><img src="{{asset('Imagenes/Productos/'.$pro->Imagen)}}" alt="{{$pro->NombProducto}}" heigth="100px" width="100px"
					class = "img-thumbnail"></td>
					<td>S/ {{$pro->Precio}}</td>
					<td>{{$pro->Descripcion}}</td>
					<td>{{$pro->Denominacionc}}</td>
					<td>
						<a href="{{URL::action('ProductoController@edit',$pro->IdProducto)}}">
						<button class="btn btn-info"
						title="Editar {{ $pro->NombProducto }}">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</button></a>
					</td>
					<td>
						<form action="{{ URL::action('ProductoController@destroy', $pro->IdProducto) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button  class="btn btn-danger  borrar"
							 title="Eliminar {{ $pro->NombProducto }}"
                            data-nombre="{{ $pro->NombProducto }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
					</td>
				</tr>

                @endforeach
			</table>
		</div>
		{{$Producto->render()}}
	</div>
</div>
@endsection
