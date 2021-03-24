@extends('admin.template.main')
@section('title', 'Crear Usuario')
@section('content')
@section('usuario', 'active')
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

    <form action="{{ url('admin/user') }}" method="post">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="form-group col-lg-8">
                <label name="name" class="col-lg-1 control-label">Nombre</label>
                <div class="col-lg-8">
                    <input type="text" name="name" placeholder="Nombre" required class="form-control" />
                </div>
            </div>
            <div class="form-group col-lg-8">
                <label name="apellido" class="col-lg-1 control-label">Apellido</label>
                <div class="col-lg-8">
                    <input type="text" name="apellido" placeholder="Apellido" required class="form-control" />
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label name="email" class="col-lg-1 control-label">Correo Electronico</label>
                <div class="col-lg-6">
                    <input type="email" name="email" class="form-control" placeholder="ejemplo@mail.com" required />
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label name="password" class="col-lg-1 control-label">Contraseña</label>
                <div class="col-lg-8">
                    <input type="password" class="form-control" placeholder="****************" required />
                </div>
            </div>
            <div class="form-group col-lg-8">
                <label name="type" class="col-lg-1 control-label">Tipo de usuario</label>
                <div class="col-lg-8">

                    <select name="type" class="form-control">
                        <option value=""> Seleccione un rol</option>
                        <option value="member"> Miembro</option>
                        <option value="admin"> Administrador</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group col-lg-8">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>

    </form>
@endsection
