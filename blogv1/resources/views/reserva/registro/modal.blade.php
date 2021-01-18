<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-add">
    {{ Form::Open(['action' => ['Cliente2Controller@store'], 'method' => ' POST']) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" style="text-align: center; font-weight: bold">
                    Agregando Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="TipDocumento">TIPO DOCUMENTO</label>
                        <select name="TipDocumento" id="TipDocumento" class="form-control selectpicker">
                            @if (old('TipDocumento') == 'PASAPORTE')
                                <option value="DNI">DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="PASAPORTE" selected>PASAPORTE</option>
                            @elseif(old('TipDocumento') == 'RUC')
                                <option value="DNI">DNI</option>
                                <option value="RUC" selected>RUC</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            @else
                                <option value="DNI" selected>DNI</option>
                                <option value="RUC">RUC</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="NumDocumento">N° DOCUMENTO</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                        <input type="text" name="NumDocumento" value="{{ old('NumDocumento') }}" class="form-control"
                            placeholder="Ingrese el N° de Documento de Identificación."
                            onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" maxlength="8"
                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            pattern="[0-9]{8}" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Nombre">NOMBRES</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="text" name="Nombre" value="{{ old('Nombre') }}" class="form-control"
                                placeholder="Ingrese los nombres del Cliente" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Apellido">APELLIDOS</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" name="Apellido" id="Apellido" value="{{ old('Apellido') }}"
                            class="form-control" placeholder="Ingrese los Apellidos del Cliente" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Celular">CELULAR</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-phone" aria-hidden="true"></i></span>
                        <input type="text" name="Celular" value="{{ old('Celular') }}" class="form-control"
                            placeholder="Ingrese el N° de Celular" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Correo">CORREO</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <input type="text" name="Correo" value="{{ old('Correo') }}" class="form-control"
                            placeholder="Ingrese el correo electrónico del Cliente">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Direccion">DIRECCIÓN ORIGEN</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <input type="text" name="Direccion" value="{{ old('Direccion') }}" class="form-control"
                            placeholder="Ejm: Lima - Jr. Las Americas 454">
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{ $Habitacion->Num_Hab }}" name="n_hab">
                <input type="hidden" name="IdTipoCliente" value="1">

            </div>
            <div class="modal-footer">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>

    </div>
    {{ Form::Close() }}

</div>
