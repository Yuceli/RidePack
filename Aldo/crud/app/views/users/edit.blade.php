@extends('layouts/master')

@section('seccion_activa')
  <li><a href="/users">Todos</a></li>
  <li><a href="/users/create">Nuevo</a></li>
@stop

@section('contenido')
  <div class="panel-heading">
    <h4>Editar usuario</h4>
  </div>
  <div class="panel-body">
    <form method="post" action="/users/update/{{ $user->id }}">
      <p>
        <input value="{{ $user->username }}" type="text" name="username" placeholder="Nombre de usuario" class="form-control" required>
      </p>
      <p>
        <input value="{{ $user->namecomplete }}" type="text" name="namecomplete" placeholder="Nombre completo" class="form-control" required>
      </p>
      <input type="submit" value="Guardar" class="btn btn-success">
      <a href="/users" class="btn btn-default">Regresar</a>
    </form>
  </div>
@stop