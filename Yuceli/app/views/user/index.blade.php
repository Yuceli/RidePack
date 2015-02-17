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
				<a class="navbar-brand" href="{{URL::to('user')}} ">Usuarios</a>
			</div>

			<ul class="nav navbar-nav">
				<li><a href="{{URL::to('user')}}">Ver todos los usuarios</a></li>
				<li><a href="{{URL::to('user/create')}}">Crear nuevo usuario</a>
			</ul>
		</nav>

		<h1>Todos los usuarios</h1>
        @if (Session::has('message'))
        <div class="alert alert-info">{{Session::get('message')}}</div>
        @endif

        <table class="table table-striped table-bordered">
        	<thead>
        		<tr>
        			<td>ID</td>
        			<td>Nombre</td>
        			<td>Email</td>
        			<td>Nivel</td>
        			<td>Acción</td>
        		</tr>
        	</thead>

        	<tbody>
        		@foreach($user as $key => $value)
        		<tr>
        			<td>{{ $value->id }}</td>
        			<td>{{ $value->name }}</td>
        			<td>{{ $value->email }}</td>
        			<td>{{ $value->level }}</td>

        			<td>
                                        {{ Form::open(array('url' => 'user/' . $value->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Eliminar usuario', array('class'=> 'btn btn-warning')) }}
                                        {{ Form::close() }}
        				<a class="btn btn-small btn-success" href="{{ URL::to('user/' .$value->id) }}">Mostrar usuario</a>
        				<a class="btn btn-small btn-info" href=" {{ URL::to('user/' .$value->id .'/edit') }}">Editar usuario</a>
        			</td>
        		</tr>
        		@endforeach
        	</tbody>
        </table>
	</div>
	
</body>
</html>