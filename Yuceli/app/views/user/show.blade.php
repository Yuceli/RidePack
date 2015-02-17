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
  			<a class="navbar-brand" href="{{URL::to('user')}}">Usuarios</a>
  		</div>

  		 <ul class="nav navbar-nav">
  		 	<li><a href="{{ URL::to('user') }}">Ver todos los usuarios</a></li>
  		 	<li><a href="{{ URL::to('user/create') }}">Crear nuevo usuario</a></li>
  		 </ul>
  		 </nav>

  		 <h1>Ver {{$user->name}}</h1>
  		 <div class="jumbotron text-center">
  		 	<h2>{{ $user->name}}</h2>
  		 	<p>
  		 		<strong>Email:</strong>{{ $user->email}}<br>
  		 		<strong>Level:</strong>{{ $user->level}}
  		 	</p>
  		 </div>
  </div>
	
</body>
</html>