@extends ('layout.admin')
@section ('Contenido')
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
        <i  aria-hidden="true" style="padding-right: 1em"></i>
        Listado de Registros

        
        <div class="form-group" style="float: right">
            @php($c = 0)
            @foreach ($reserva as $re)
                @php($c += 1)
            @endforeach
                <label for="">Nro de Registros: {{$c}} </label>
            </div>
    </div>
    
</div>
<div class="row">
    @include('reserva.listar-registro.search')

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
        <div class="form-group">
            <a href="listar-registro/create"><button class="btn btn-success">Realizar Nuevo Registro</button></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table  table-striped table-bordered table-condensed table-hover">
                <thead class="htable">
                    <th class="bg-primary">N° HABITACIÓN</th>
                    <th class="bg-primary">CLIENTE</th>
                    <th class="bg-primary">F. ENTRADA/F. RESERVA</th>
                    <th class="bg-primary">F.SALIDA</th>
                    <th class="bg-primary">OBSERVACIONES</th>
                    <th class="bg-primary">ESTADO</th>
                    <th class="bg-primary"colspan="2">ACCIONES</th>
                </thead>
            @foreach ($reserva as $re)
                <tr>
                    <td> Hab Nro: {{ $re->Num_Hab}}</td>
                    <td>{{ $re->nomcli}} {{ $re->apecli}}</td>
                    @if ($re->FechEntrada == null)
                        <td>{{ date_format(new DateTime($re->FechReserva), "d/m/Y")}} </td>
                    @else
                        <td>{{ date_format(new DateTime($re->FechEntrada), "d/m/Y")}} </td>
                    @endif
                    <td>{{ date_format(new DateTime($re->FechSalida), "d/m/Y") }}</td>
                    <td>{{ $re->Observacion}}</td>

                    <td >
                        @if($re->EsReser == 'HOSPEDAR')
                            <div class="badge label-danger">HOSPEDADO</div>
                        @elseif($re->EsReser == 'RESERVAR')
                            <div class="badge label-info">RESERVADO</div>
                        @else
                            <div class="badge label-secondary">R. CULMINADO</div>
                        @endif
                    </td>
                    <td>
                        @if($re->EsReser != 'H. CULMINADO')
                            <a href="{{URL::action('LReservaController@edit', $re->IdReserva)}}" ><button  class="btn btn-info"
                            title="Editar Registro Nro: {{$re->IdReserva}}" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button></a>
                        @else
                            <a href="#" >
                                <button  class="btn btn-info" disabled >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button></a>
                        @endif
                        <!-- <a href="" data-target="#modal-delete-{{$re->IdReserva}}" data-toggle="modal" ><input type="button" value="Eliminar" class="bn btn-danger"></a> -->
                    </td>
                    <td>
                        @if($re->EsReser == 'H. CULMINADO')
                            <a href="{{URL::action('LReservaController@show', $re->IdReserva)}}">
                                <button class="btn btn-warning">
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                </button>
                            </a>
                        @else
                            <a href="#">
                                <button class="btn btn-warning" disabled>
                                    <i class="fa fa-info" aria-hidden="true"></i>
                                </button>
                            </a>
                        @endif

                    </td>
                </tr>
            @endforeach
            </table>
        </div>

        {{$reserva->render()}}
    </div>
</div>
<!-- <script>
    const selectElement = document.querySelector('.searchText');
    selectElement.addEventListener('change', (event) => {
        $("#buscar").click();

    });

</script> -->
@endsection
