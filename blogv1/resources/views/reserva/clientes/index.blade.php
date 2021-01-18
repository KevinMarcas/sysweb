@extends('layout.admin')
@Section ('Contenido')
    <div class="row" style="margin-top: -15px;">
        <div class="cabecera">
            <i  aria-hidden="true" style="padding-right: 1em"></i>
            Registro de Clientes
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
            <a href="clientes/create"><button class="btn btn-success">
                Agregar nuevo Cliente
            </button></a>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
            @include('reserva.clientes.search')
        </div>
    </div>
    <br>
    <!--
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            @.include('reserva.clientes.search')
        </div>
    </div>
-->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="htable">
                        <th class="bg-primary">NOMBRES DEL CLIENTE</th>
                        <th class="bg-primary">N° CELULAR</th>
                        <th class="bg-primary">CORREO</th>
                        <th class="bg-primary">TIPO DOCUMENTO</th>
                        <th class="bg-primary">N° DOCUMENTO</th>
                        <th class="bg-primary">ORIGEN</th>
                        <th class="bg-primary">EDITAR</th>
                        <th class="bg-primary">ELIMINAR</th>
                    </thead>
                    @foreach ($Cliente as $pro)
                        <tr>
                            {{-- <td>{{ $pro->IdCliente }}</td>
                            --}}
                            @if ($pro->TipDocumento == 'RUC')
                                <td>{{ $pro->Nombre }}</td>
                            @else
                                <td>{{ $pro->Nombre }} {{ $pro->Apellido }}</td>
                            @endif
                            <td>{{ $pro->Celular }}</td>
                            <td>{{ $pro->Correo }}</td>
                            <td>{{ $pro->TipDocumento }}</td>
                            <td>{{ $pro->NumDocumento }}</td>
                            <td>{{ $pro->Direccion }}</td>
                            {{-- <td>{{ $pro->Denominacionc }}</td> --}}
                            <td>
                                <a href="{{ URL::action('ClienteController@edit', $pro->IdCliente) }}">
                                <button class="btn btn-info"
                                title="Editar datos del Cliente {{ $pro->Nombre }}
                                {{ $pro->Apellido }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button></a>

                            </td>
                            <td>
                                <form class="edi" action="{{ URL::action('ClienteController@destroy', $pro->IdCliente) }}"
                                    method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-danger  borrar" title="Eliminar {{ $pro->Nombre }}"
                                        data-nombre="{{ $pro->Nombre }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
            {{ $Cliente->render() }}
        </div>
    </div>
@endsection
