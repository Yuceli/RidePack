@extends('layouts/master')

@section('seccion_activa')
	<li><a href="/users">Todos</a></li>
	<li class="active"><a href="/users/create">Nuevo</a></li>
@stop

@section('contenido')
	<div class="panel-heading">
  			<h4>Nuevo usuario</h4>
  		</div>

  		<div class="panel-body">
  			<form method="post" action="store">
				<p>
					<input type="text" name="username" placeholder="Nickname" class="form-control" required>
				</p>
				<p>
					<input type="text" name="namecomplete" placeholder="Nombre Real" class="form-control" required>
				</p>
				<p>
					<input type="submit" value="Guardar" class="btn btn-success">
				</p>
			</form>
		</div>
@stop