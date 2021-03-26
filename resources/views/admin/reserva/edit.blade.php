@extends('admin.template.main')
@section('title', 'Crear Reserva')
@section('content')
@section('reserva', 'active')

    <form action="{{ route('reserva.update',[ 'reserva' => $reserva])}}" method="post">
        @csrf
        @method('PATCH')
        <input name="user_id" type="hidden" value="{{ $reserva->user->id }}">
        <div class="form-group">
            <div class="form-group col-lg-8">
                <label name="name" class="col-lg-1 control-label">Cliente {{ $reserva->user->name }}</label>
            </div>
            <div class="form-group col-lg-8">
                <label name="apellido" class="col-lg-1 control-label">Fecha</label>
                <div class="col-10">
                    <input class="form-control" name = "fecha"type="date" value="{{ $reserva->fecha }}" id="example-date-input">
                  </div>
            </div>
            <div class="form-group col-lg-12">
                <h3><span class="label label-info">Butacas Reservadas Actualemente</span></h3>
            </div>
            <div class="form-check">
                @foreach ($reserva->butacas as $but)
                <input class="form-check-input form-control" name="butacas_actual[]" type="checkbox" value="{{ $but->id }}" id="{{ $but->id }}" checked required>
                <label class="form-check-label col-lg-1 control-label" for="{{ $but->id }}">
                    Fila:{{ $but->fila->n_fila}} - Columna: {{ $but->columna->n_columna}}
                </label>   
          
                @endforeach
              </div>
            <div class="form-group col-lg-12">
                <h3><span class="label label-success">Butacas Disponibles</span></h3>
            </div>
            <div class="form-check">
                @foreach ($butacas as $butaca)
                <input class="form-check-input form-control" name="butacas_disponibles[]" type="checkbox" value="{{ $butaca->id }}" id="{{ $butaca->id }}" required>
                <label class="form-check-label col-lg-1 control-label" for="{{ $butaca->id }}">
                    Fila:{{ $butaca->fila->n_fila}} - Columna: {{ $butaca->columna->n_columna}}
                </label>   
          
                @endforeach
              </div>
            <br>
            <hr />
            <div class="form-group col-lg-8">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>

    </form>
@endsection
