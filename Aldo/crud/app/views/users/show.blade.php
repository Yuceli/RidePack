@extends('layouts/master')

@section('seccion_activa')
	<li><a href="/users">Todos</a></li>
	<li><a href="/users/create">Nuevo</a></li>
@stop

@section('contenido')
	<div class="panel-heading">
  		<h4>Información del usuario</h4>
  	</div>

  	<div class="panel-body">
  		<p>
  			Nombre de usuario: <strong>{{ $user->username }}</strong>
  		</p>
  		<p>
  			Nombre completo: <strong>{{ $user->namecomplete }}</strong>
  		</p>
        <a href="/users" class="btn btn-default">Regresar</a>
	</div>
@stop