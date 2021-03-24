@extends('admin.template.main')
@section('title', 'Editar Usuario')
@section('content')
    <h2>Editar Usuario {{ $user->name }}</h2>
@section('usuario', 'active')
    <form action="{{ route('user.update',[ 'user' => $user]) }}" method="POST">
        @csrf
        @method('PATCH')
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-group col-lg-8">
                <label name="name" class="col-lg-1 control-label">Nombre</label>
                <div class="form-group col-lg-8">
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required />
                </div>
            </div>
            <div class="form-group col-lg-8">
                <label name="apellido" class="col-lg-1 control-label">Apellido</label>
                <div class="form-group col-lg-8">
                    <input type="text"name="apellido" value="{{ $user->apellido }}" class="form-control" required />
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label name="email" class="col-lg-1 control-label">Correo Electronico</label>
                <div class="col-lg-6">
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required />
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label name="password" class="col-lg-1 control-label">Contraseña</label>
                <div class="col-lg-8">
                    <input type="password" name="password" value="{{ $user->password }}" required />
                </div>
            </div>
            <div class="form-group col-lg-8">
                <label name="type" class="col-lg-1 control-label">Tipo de usuario</label>
                <div class="col-lg-8">
                    <select name="type" class="form-control">
                        <option value="">Seleccion una Opcion</option>
                        <option value="admin" @if ($user->type === 'admin') selected @endif>Administrador</option>
                        <option value="member" @if ($user->type === 'member') selected @endif>Miembro</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group col-lg-8">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
    </form>
@endsection
