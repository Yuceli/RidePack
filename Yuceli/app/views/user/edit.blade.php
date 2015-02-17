<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD YUCELI</title>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('user')}}">Usuario</a>
			</div>

			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('user') }}">Ver todos los usuarios</a></li>
				<li><a href="{{ URL::to('user/create')}}">Crear nuevo usuario</a></li>
			</ul>
		</nav>

		<h1>Editar {{ $user->name}}</h1>

		{{ HTML::ul($errors->all()) }}
		{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('name', 'Nombre')}}
		    {{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email')}}
			{{ Form::text('email', null, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('level', 'Nivel')}}
			{{ Form::select('level', array('0' => "Selecciona nivel", '1' => 'Bajo', '2' => 'Medio', '3' => 'Alto'),
			  null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Cambios guardados con exito', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}
	</div>
	
</body>
</html>