<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CRUD de capacitación para Laravel</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		body {
			width: 500px;
			margin: 60px auto;
		}
		.badge {
			float: right;
		}
	</style>
</head>
<body>
	<h1>CRUD</h1>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
  			<div class="navbar-header">
				<a class="navbar-brand" href="#">LARAVEL</a>
  			</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
      				@yield('seccion_activa')
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
    @yield('contenido')
  </div>

  	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</body>
</html>