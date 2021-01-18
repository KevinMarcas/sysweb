@extends('layout.admin')
@Section ('Contenido')
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
        <i  aria-hidden="true" style="padding-right: 1em"></i>
        Reporte Diario
    </div>
</div>
<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-8 col-xs-12">

	</div>
</div>
<br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead class="htable">
					{{-- <th>Id</th> --}}
					<th class="bg-primary">N°</th>
                    <th class="bg-primary">N° DE HABITACIÓN</th>
                    <th class="bg-primary">FECHA INGRESO</th>
                    <th class="bg-primary">FECHA SALIDA</th>
                    <th class="bg-primary">DINERO DEJADO</th>
				</thead>
				@php($contador = 0)
				   @foreach ($pago as $p)
				   @php($contador += 1)
				<tr>
					<td>{{$contador}}</td>
                    <td>{{$p->Num_Hab}}</td>
                    <td>{{$p->FechEntrada}}</td>
                    <td>{{$p->FechSalida}}</td>
					<td>S/ {{$p->TotalPago}}</td>
				</tr>
                @endforeach
			</table>
		</div>
		{{$pago->render()}}
	</div>
</div>
@endsection
