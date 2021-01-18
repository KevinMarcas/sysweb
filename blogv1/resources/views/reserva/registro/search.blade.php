{!! Form::open(['url' => 'reserva/registro', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search']) !!}
<div class="row" style="margin-top: -15px;">
    <div class="cabecera">
        <i  aria-hidden="true" style="padding-right: 1em"></i>
        @if ($searchText != '')
                Habitaciones del {{ $searchText }}
            @else
                Se muestran todas las Habitaciones
        @endif
    </div>
</div>
<div class="row">
    <div class="col-log-4 col-md-4 col-sm-8 col-xs-12">
        <div class="form-group">
            <select name="searchText" class="form-control selectpicker  searchText">
                <option value="">Seleccione el Nivel/Piso</option>
                @foreach ($nivel as $n)
                    @if ($n->Denominacion == $searchText)
                        <option value="{{ $n->Denominacion }}" selected>{{ $n->Denominacion }}</option>
                    @else
                        <option value="{{ $n->Denominacion }}">{{ $n->Denominacion }}</option>
                    @endif
                @endforeach
            </select>

            <span class="input-group-btn">
                <button type="submit" id="buscar" class="btn btn-primary"> </button>
            </span>

            <!-- <input type="text" class="form-control" name="searchText" placeholder="Buscar.." value="{{ $searchText }}"> -->

        </div>
    </div>
</div>

{{ Form::close() }}
