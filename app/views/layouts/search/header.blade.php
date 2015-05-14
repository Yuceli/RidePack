<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>RidePack</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon.ico') }}">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
  <!-- Global CSS -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- Plugins CSS -->    
    <link rel="stylesheet" href="{{ URL::asset('plugins/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/prism/prism.css') }}">
  <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link id="theme-style" rel="stylesheet" href="{{ URL::asset('css/upcoming-trips.css')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 
<body>

  <!-- ******HEADER****** --> 
  <header id="header" class="header">  
    <div class="container">            
      <h1 class="logo pull-left">
        <a href="{{ url('/')}}">
          <span class="logo-title">RidePack</span>
        </a>
      </h1><!--//logo-->              
      <nav id="main-nav" class="main-nav navbar-right" role="navigation">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><!--//nav-toggle-->
        </div><!--//navbar-header-->            
        <div class="navbar-collapse collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a href="{{ url('profile')}}">Perfil</a></li>
            <li class="nav-item active"><a href="{{ url('upcoming/packages')}}">Buscar</a></li>
            <li class="nav-item"><a href="{{ url('post/package')}}">Publicar paquete</a></li>                        
            <li class="nav-item"><a href="{{ url('post/trip')}}">Publicar viaje</a></li>
            <li class="nav-item"><a href="{{ url('logout')}}">Cerrar sesión</a></li>
            <li class="nav-item last">
              @if(Auth::user()->picture)
                <img class="media-object img-circle" src="{{asset(Auth::user()->picture)}}" width="50px" height="50px" alt="profile">
              @else
                <img class="media-object img-circle" src="{{asset('img/default_user.png')}}" width="50px" height="50px" alt="profile">
              @endif
            </li>
          </ul><!--//nav-->
        </div><!--//navabr-collapse-->
      </nav><!--//main-nav-->
    </div>
  </header><!--//header--> 