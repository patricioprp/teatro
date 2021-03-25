@extends('admin.template.main')
@section('title', 'Crear Reserva')
@section('content')
@section('reserva', 'active')

    <form action="{{ url('admin/reserva') }}" method="post">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input name="user_id" type="hidden" value="{{ $user->id }}">
        <div class="form-group">
            <div class="form-group col-lg-8">
                <label name="name" class="col-lg-1 control-label">Cliente {{ $user->name }}</label>
            </div>
            <div class="form-group col-lg-8">
                <label name="apellido" class="col-lg-1 control-label">Fecha</label>
                <div class="col-10">
                    <input class="form-control" name = "fecha"type="date" value="2021-03-19" id="example-date-input">
                  </div>
            </div>
            <div class="form-group col-lg-12">
                <p><label name="butacas" class="col-lg-1 control-label">Butacas</label></p>
            </div>
            <div class="form-check">
                @foreach ($butacas as $butaca)
                <input class="form-check-input form-control" name="butacas[]" type="checkbox" value="{{ $butaca->id }}" id="{{ $butaca->id }}">
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
