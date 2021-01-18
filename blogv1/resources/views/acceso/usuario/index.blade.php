@extends ('layout.admin')
@section ('Contenido')
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
         <i class="fa fa-user" style="padding-right: 1em "></i> 
            Usuarios registrados en el Sistema
        
        
        <div class="form-group" style="float:right">
            @php($c = 0)
            @foreach ($usuario as $us)
                @php($c += 1)
            @endforeach
                <label for="">Nro de Registros: {{$c}} </label>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-log-3 col-md-3 col-sm-12 col-xs-12">
        <div class="form-group">
        <a href="usuario/create">
        <button class="btn btn-success btn-block">
        Agregar nuevo Usuario  </button></a>
        </div>
        
    </div>
    <div class="col-log-4 col-md-4 col-sm-8 col-xs-12">
        <div class="form-group">
            @include('acceso.usuario.search')
        </div>
    </div>

<!--
    <div class="col-log-8 col-md-8 col-sm-4 col-xs-12">
        <div class="form-group" style="float:right">
            @.php($c = 0)
            @.foreach ($usuario as $us)
                @.php($c += 1)
            @.endforeach
                <label for="">Nro de Registros: { {$c}} </label>
        </div>
    </div>
-->

</div>
<!--
<div class="row">
    <div class="col-log-4 col-md-4 col-sm-8 col-xs-12">
        <div class="form-group">
            @.include('acceso.usuario.search')
        </div>
    </div>
</div>
-->
<br>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead class="htable" >
                    <th class="bg-primary">N° DOCUMENTO</th>
                    <th class="bg-primary">NOMBRES DEL USUARIO</th>
                    <th class="bg-primary">CELULAR</th>
                    <th class="bg-primary">ESTADO</th>
                    <th class="bg-primary" colspan="2">OPCIONES</th>

                </thead>
            @foreach ($usuario as $usu)
                <tr>
                    <td>{{ $usu->NumDocumento}}</td>
                    <td>{{ $usu->Nombre}} {{ $usu->Apellido}}</td>
                    <td>{{ $usu->Celular}}</td>
                    <td >
                        @if ($usu->Estado == "ACTIVO")
                            <span class="badge label-success">{{ $usu->Estado}}</span>
                        @else
                            <span class="badge label-danger">{{ $usu->Estado}}</span>
                        @endif
                    </td>
                    <td>
                        <a class="edi"  title="Editar Usuario"
                        href="{{URL::action('UsuarioController@edit', $usu->IdUsuario)}}">
                        <button class="btn btn-info ">
                         <i class="fa fa-edit" aria-hidden="true"></i> </button></a>
                    </td>
                    <td>
                        @if ($usu->Estado == "ACTIVO")
                        <button  class="btn btn-danger apertura"
                        title="Cambiar estado a {{ $usu->Nombre }}" data-nombre="{{ $usu->IdUsuario }}">
                        <i class="fa fa-user-times" aria-hidden="true"></i>
                        @else
                        <button  class="btn btn-success apertura"
                        title="Cambiar estado a {{ $usu->Nombre }}" data-nombre="{{ $usu->IdUsuario }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
        {{$usuario->appends(['searchText' => $searchText])->links()}}
        <!-- {{$usuario->render()}} -->
    </div>
</div>

@push ('scripts')
<script>
    $('.apertura').unbind().click(function () {
      var $button = $(this);
      var data_nombre = $button.attr('data-nombre');
      Swal.fire({
        title: '¿Desea cambiar el estado del Usuario?',
        showDenyButton: true,
        confirmButtonText: `Cambiar`,
        denyButtonText: `Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            var d = '{{URL::action("UsuarioController@show", 0)}}' + data_nombre
          window.location.href = d;
        } else if (result.isDenied) {
          Swal.fire('No se realizó ningún cambio', '', 'info')
        }
      })
      return false;
    });
</script>
@endpush
@endsection
