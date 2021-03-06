
@extends('admin.template.main')
@section('title','Lista de Usuarios')
@section('content')
@section('usuario','active')
<h3><b>Modulo de Gestion de Usuario</b></h3>
<a href="{{ asset('admin/user/create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
<div class="col-xs-12">
<div class="table-responsive">
  <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
    <thead>
      <th>#</th>
      <th>NOMBRE</th>
      <th>CORREO ELECTRONICO</th>
      <th>TIPO</th>
      <th>ACCION</th>
    </thead>
    <tbody>
      @foreach ($users as $user)
         <tr>
           <td>{{$user->id}}</td>
           <td>{{ $user->name }}-{{$user->apellido}}</td>
           <td>{{$user->email}}</td>
          <td>
           @if ($user->type == "member")
              <span class="label label-success">{{$user->type}}</span>
           @else
             <span class="label label-danger">{{$user->type}}</span>
           @endif
         </td>
           <td>
             <a href="{{route('admin.user.destroy',$user->id)}}" onclick="return confirm('Desea eliminar a {{$user->name}}')" class="btn btn-danger" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
             <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning" title="Editar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
             <a href="{{route('user.show',$user->id)}}" class="btn btn-success" title="Editar">Ver Reservas</a>
           </td>
         </tr>
      @endforeach

    </tbody>
  </table>
  </div>
  </div>
  <p></p>
{!! $users->render() !!}
@endsection