@extends('layout.admin')
@Section ('Contenido')
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
        <i  aria-hidden="true" style="padding-right: 1em"></i>
        Listado de Niveles de Habitación
    </div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-8 col-xs-12">
        <a href="nivel/create">
		<button class="btn btn-success btn-block">Agregar nuevo Nivel</button></a>
    </div>
    <div class="col-lg-4 col-md-10 col-sm-8 col-xs-12">
		@include('mantenimiento.nivel.search')
	</div>
</div>
<br>
<!--
<div class="row">
	<div class="col-lg-8 col-md-10 col-sm-8 col-xs-12">
		@.include('mantenimiento.nivel.search')
	</div>
</div>-->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead class="htable">
					{{-- <th>Id</th> --}}
                    <th class="bg-primary">DENOMINACIÓN DEL NIVEL</th>
                    <th class="bg-primary">EDITAR</th>
                    <th class="bg-primary">ELIMINAR</th>
				</thead>
               @foreach ($Nivel as $cat)
				<tr>
					{{-- <td>{{$cat->IdNivel}}</td> --}}
                    <td>{{$cat->Denominacion}}</td>
					<td >
                        <a href="{{URL::action('NivelController@edit',$cat->IdNivel)}}">
                            <button class="btn btn-info"
                            title="Editar {{ $cat->Denominacion }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button></a>
                    </td>
                    <td>
                        <form class="edi" action="{{ URL::action('NivelController@destroy', $cat->IdNivel) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button  class="btn btn-danger  borrar"
                            title="Eliminar {{ $cat->Denominacion }}"
                            data-nombre="{{ $cat->Denominacion }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
				</tr>
                @endforeach
			</table>
		</div>
		{{$Nivel->render()}}
	</div>
</div>
@endsection
