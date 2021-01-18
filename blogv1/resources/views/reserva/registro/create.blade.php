<?php date_default_timezone_set('America/Lima'); ?>
@extends ('layout.admin')
@section('Contenido')
    <div class="row" style="margin-top: -15px;">
        <div class="cabecera">
            <i class="fa fa-plus" aria-hidden="true" style="padding-right: 1em"></i>
            Agregando nuevo Registro
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p style="font-size:20px;"><b>DETALLES DE HABITACIÓN</b></p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="titulo">N° HABITACIÓN: </div> {{ $Habitacion->Num_Hab }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="titulo">TIPO DE HABITACIÓN: </div> {{ $Habitacion->tipoden }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <label>
                            <div class="titulo">ESTADO: </div>
                            @if ($Habitacion->Estado == 'DISPONIBLE')
                                <div style="float:left; background: #1cad69; color: #ffffff; padding: 0 3px 0 3px;">
                                    {{ $Habitacion->Estado }}
                                </div>
                            @elseif ($Habitacion->Estado == "RESERVADO")
                                <div style="float:left; background: #1c7fad; color: #ffffff; padding: 0 3px 0 3px;">
                                    {{ $Habitacion->Estado }}
                                </div>
                            @elseif ($Habitacion->Estado == "OCUPADO")
                                <div style="float:left; background: #e67469; color: #ffffff; padding: 0 3px 0 3px;">
                                    {{ $Habitacion->Estado }}
                                </div>
                            @endif
                        </label>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <div class="titulo">DESCRIPCIÓN: </div> {{ $Habitacion->deshab }}
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="titulo">PRECIO: </div> S/ {{ $Habitacion->Precio }}
                        <input type="hidden" id="Precio" value="{{ $Habitacion->Precio }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            <div id="error_fecha" class=" bg-danger text-danger"></div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">CLIENTE</label>

                <table style="width: 100%">
                    <tr>
                        <td colspan="2">
                            <select name="id_cliente2"
                        class="form-control selectpicker" id="id_cliente2" data-live-search="true">
                            @foreach ($Cliente as $c)
                                <option value="{{ $c->IdCliente }}">{{ $c->NumDocumento }} | {{ $c->Nombre }} {{ $c->Apellido }}
                                </option>
                            @endforeach
                        </select>

                        </td>
                        <td style=" width: 2%;">
                            <a href="" data-target="#modal-add"
                            style="float: right;" data-toggle="modal" class="btn btn-info">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

         @include('reserva.registro.modal')

    {!! Form::open(['url' => 'reserva/registro', 'method' => 'POST', 'autocomplete' => 'off']) !!}
    {{ Form::token() }}

        <input type="hidden" id="IdCliente" name="IdCliente" >
        <!-- Para el autoincrementable -->

        @if (isset($Reserva))
            <input type="hidden" name="codigo" value="{{ $Reserva->IdReserva }}">
        @else
            <input type="hidden" name="codigo" value="0">
        @endif
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="c_comensales">TIPO DE REGISTRO</label>
                <select name="Estado" class="form-control selectpicker" id="Estado">
                    <option value="HOSPEDAR">HOSPEDAR</option>
                    <option value="RESERVAR">RESERVAR</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="" id="Entrada">FECHA DE ENTRADA</label>
                <label for="" id="Reserva" style="display:none;">FECHA RESERVA</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar" aria-hidden="true"></i></span>
                <input type="date"
                    min="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' -0 day')); ?>"
                    id="freserva" name="FechReserva" value="<?php echo date('Y-m-d'); ?>"
                    readonly class="form-control">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">FECHA DE SALIDA</label>
                <input type="date" name="FechSalida" id="fsalida"
                    min="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); ?>"
                    value="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); ?>"
                    class="form-control">
            </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <input type="hidden" name="Num_Hab" value="{{ $Habitacion->Num_Hab }}">
                <label for="">TOTAL A PAGAR</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-money" aria-hidden="true"></i></span>
                <input type="text" id="costo" name="CostoAlojamiento" readonly
                name="Observaciones" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">ADELANTO</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-usd" aria-hidden="true"></i></span>
                <input type="text" id="Adelanto" name="Adelanto" value="0.00"
                 class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">PORCENTAJE DE ADELANTO</label>
                <select name="PorAdelanto" id="PorAdelanto" class="form-control selectpicker">
                    <option value="0">0 %</option>
                    <option value="50">50 %</option>
                    <option value="100">100 %</option>
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">OBSERVACIONES</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-info-circle" aria-hidden="true"></i></span>
                <textarea name="Observacion"
                placeholder="Escribir Aqui! algún detalle que tenga el registro."
                Class="form-control"></textarea>
                </div>
            </div>
        </div>


    </div>
    <div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
                <a href="{{ asset('reserva/registro') }}"
                class="btn btn-danger">Volver Atras</a>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
            <div class="form-group">
                <button class="btn btn-primary"
                style="float: right;" type="submit" id="agregar">Agregar Registro</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    <script>
        window.onload = updateValue;
        const input = document.querySelector('#fsalida');
        const input2 = document.querySelector('#freserva');

        input.addEventListener('change', updateValue2);
        input2.addEventListener('change', updateValue);

        function updateValue(e) {
            // Calculamos la diferencia en dias
            fecha1 = document.getElementById("freserva").value;
            fecha2 = document.getElementById("fsalida");

            // Establecemos el min de la fecha final
            var f = new Date(fecha1);
            fecha2.setAttribute("min", f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + ("0" + (f.getDate() + 2)).slice(-
                2));
            console.log(fecha1);
            //fecha2.value = f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + ("0" + (f.getDate() + 2)).slice(-2);

            var fechaInicio = new Date(fecha1).getTime();
            var fechaFin = new Date(fecha2.value).getTime();

            var dia = (fechaFin - fechaInicio) / (1000 * 60 * 60 * 24);
            // Calculamos el total a pagar
            precio = document.getElementById("Precio").value;
            var n = dia * precio;
            document.getElementById("costo").value = n.toFixed(2);
            var r = (document.getElementById("PorAdelanto").value * n) / 100;
            document.getElementById("Adelanto").value = r.toFixed(2);
            FechaValida(fecha1, fecha2.value);
        }

        function updateValue2(e) {
            fecha1 = document.getElementById("freserva").value;
            fecha2 = document.getElementById("fsalida");
            var fechaInicio = new Date(fecha1).getTime();
            var fechaFin = new Date(fecha2.value).getTime();
            var dia = (fechaFin - fechaInicio) / (1000 * 60 * 60 * 24);
            // Calculamos el total a pagar
            precio = document.getElementById("Precio").value;
            var n = dia * precio;
            document.getElementById("costo").value = n.toFixed(2);
            var r = (document.getElementById("PorAdelanto").value * n) / 100;
            document.getElementById("Adelanto").value = r.toFixed(2);
            FechaValida(fecha1, fecha2.value);
        }


        function FechaValida (fecha_Inicial, fecha_Final){
            var agregar = document.getElementById("agregar");
            var error_fecha = document.getElementById("error_fecha");
            if (fecha_Inicial >= fecha_Final){
                error_fecha.innerHTML = '<li>La fecha inicial no debe ser mayor o igual que la fecha final.</li>';
                error_fecha.style.padding = "15px";
                agregar.style.display = "none";
            }else {
                error_fecha.innerHTML = '';
                agregar.style.display = "block";
                error_fecha.style.padding = "0px";
            }
        }

        // Revervar/Hospedar
        const selectElement = document.querySelector('#Estado');
        var Reserva = document.getElementById("Reserva");
        var Entrada = document.getElementById("Entrada");

        selectElement.addEventListener('change', (event) => {
            if (event.target.value == 'RESERVAR') {
                Entrada.style.display = "none";
                Reserva.style.display = "block";
                $("#freserva").removeAttr("readOnly");

            } else {
                Reserva.style.display = "none";
                Entrada.style.display = "block";
                $("#freserva").attr("readonly", "readonly");
                var f = new Date();
                document.getElementById("freserva").value = f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f
                    .getDate();
            }
        });

        const adelanto = document.querySelector('#PorAdelanto');
        adelanto.addEventListener('change', (event) => {
            if (event.target.value == '0') {
                var r = 0.00;
                document.getElementById("Adelanto").value = r.toFixed(2);
            } else if (event.target.value == '50') {
                var r = document.getElementById("costo").value * 0.50;
                document.getElementById("Adelanto").value = r.toFixed(2);
            } else {
                document.getElementById("Adelanto").value = document.getElementById("costo").value;
            }
        });

        // Jalamos el ID del cliente
        const cliente = document.querySelector('#id_cliente2');
        document.getElementById("IdCliente").value = document.getElementById("id_cliente2").value;
        cliente.addEventListener('change', (event) => {
            document.getElementById("IdCliente").value = event.target.value;

        });

    </script>
@endsection
