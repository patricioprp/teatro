@extends('admin.template.main')
@section('title','Lista de Usuarios')
@section('content')
@section('usuario','active')
<h3><b>Modulo de Reservas de Usuario</b></h3>
<a href="{{ asset('admin/reserva/'.$user->id.'/crear')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
<div class="col-xs-12">
<div class="table-responsive">
  <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
    <thead>
      <th>#</th>
      <th>NUMERO DE PERSONAS</th>
      <th>FECHA</th>
      <th>CLIENTE</th>
      <th>ACCION</th>
    </thead>
    <tbody>
      @foreach ($user->reservas as $reserva)
         <tr>
           <td>{{$reserva->id}}</td>
           <td>{{$reserva->n_personas}}</td>
           <td>{{ $reserva->fecha }}</td>
           <td>{{$reserva->user->name, $reserva->user->apellido}}</td>
           <td>
             <a href="{{route('admin.reserva.destroy',$reserva->id)}}" onclick="return confirm('Desea eliminar a {{$reserva->fecha}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
             <a href="{{route('reserva.edit',$reserva->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
             <a href="{{route('reserva.show',$reserva->id)}}" class="btn btn-success" title="Editar"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
           </td>
         </tr>
      @endforeach

    </tbody>
  </table>
  </div>
  </div>
  <p></p>
@endsection