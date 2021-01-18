@extends('layout.admin')
@Section ('Contenido')
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
        <i  aria-hidden="true" style="padding-right: 1em"></i>
        Registro de Habitaciones
    </div>
</div>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<a href="habitacion/create"><button class="btn btn-success">
            Agregar nueva Habitación
        </button></a>
    </div>
    <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
        @include('mantenimiento.habitacion.search')
    </div>
</div>
<br>
<!--
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        @include('mantenimiento.habitacion.search')
    </div>
</div>
-->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead class="htable">
					<th class="bg-primary">N° HABITACIÓN</th>
					<th class="bg-primary">DESCRIPCIÓN</th>
					<th class="bg-primary">PRECIO</th>
					<th class="bg-primary">TIPO HABITACIÓN</th>
                    <th class="bg-primary">NIVEL/PISO</th>
                    <th class="bg-primary">ESTADO</th>
                    <th class="bg-primary">EDITAR</th>
                    <th class="bg-primary">ELIMINAR</th>
				</thead>
               @foreach ($Habitacion as $pro)
				<tr>
					<td>{{$pro->Num_Hab}}</td>
					<td>{{$pro->Descripcion}}</td>
					<td>S/ {{$pro->Precio}}</td>
					<td>{{$pro->TipoHabitacion}}</td>
                    <td>{{$pro->Nivel}}</td>
                    <td>
                        @if ($pro->Estado == 'DISPONIBLE')
                            <span class="badge label-success">{{$pro->Estado}}</span>
                        @elseif ($pro->Estado == 'RESERVADO')
                            <span class="badge label-info">{{$pro->Estado}}</span>
                        @else
                            <span class="badge label-danger">{{$pro->Estado}}</span>
                        @endif

                    </td>
					<td>
                        <a href="{{URL::action('HabitacionController@edit',$pro->Num_Hab)}}">
                        <button class="btn btn-info"
                        title="Editar Habitación Nro {{ $pro->Num_Hab }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button></a>
                    </td>
                    <td>
                        <form class="edi" action="{{ URL::action('HabitacionController@destroy', $pro->Num_Hab) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button  class="btn btn-danger  borrar" title="Eliminar {{ $pro->TipoHabitacion }}"
                            data-nombre="{{ $pro->TipoHabitacion }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
				</tr>

                @endforeach
			</table>
		</div>
		{{$Habitacion->render()}}
	</div>
</div>
@endsection
