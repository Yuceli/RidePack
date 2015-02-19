@extends('layouts/master')

@section('seccion_activa')
	<li class="active"><a href="/users">Todos</a></li>
	<li><a href="/users/create">Nuevo</a></li>
@stop

@section('contenido')
	<div class="panel-heading">
		<h4>Lista de usuarios</h4>
	</div>

	<div class="panel-body">
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre de usuario</th>
				<th>Nombre verdadero</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->namecomplete }}</td>
					<td>
						<a href="/users/show/{{ $user->id }}"><span class="label label-info">Ver</span></a>
						<a href="/users/edit/{{ $user->id }}"><span class="label label-success">Editar</span></a>
						<a href="{{ url('/users/destroy', $user->id) }}"><span class="label label-danger">Eliminar</span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@stop