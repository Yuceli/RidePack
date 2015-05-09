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
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/prism/prism.css')}}")>
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">  
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
        <a class="scrollto" href="">
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
              <li class="active nav-item sr-only"><a class="scrollto" href="{{URL::to('/')}}">Home</a></li>
              <li class="nav-item"><a href="{{ URL::asset('profile')}}">Perfil</a></li>
              <li class="nav-item"><a href="{{ URL::asset('upcoming/trips')}}">Buscar</a></li>
              <li class="nav-item"><a href="{{ URL::asset('post/package')}}">Publicar paquete</a></li>                        
              <li class="nav-item"><a href="{{ URL::asset('post/trip')}}">Publicar viaje</a></li>
              <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
          </ul><!--//nav-->
        </div><!--//navabr-collapse-->
      </nav><!--//main-nav-->
    </div>
  </header><!--//header-->   

   <br><br><br><br><br>
  <div class="container">
    @if(Session::has('message'))
     <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong >{{ Session::get('message') }}</strong> 
      </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="#">RidePack</a></li>
          <li>Perfil de usuario</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>
              <img class="img-circle img-thumbnail" src="http://bootdey.com/img/Content/user_3.jpg">
                {{$user->name}}  {{$user->last_name}}
            </h3>
          </div>
          <div class="panel-body"> 
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Detalles</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td colspan="8"><strong>Miembro desde: </strong>{{$user->created_at->format('d/m/y')}}</td>
                  </tr>

                   <tr>
                    <td colspan="8"><strong>Ciudad: </strong>{{$user->city}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Email: </strong>{{$user->email}} </td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Paquetes publicados: </strong>{{count($user->packs)}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Viajes publicados: </strong>{{count($user->trips)}}</td>
                  </tr>
                  <?php
                  $counter=0;
                  foreach ($user->trips as $trip){
                    $counter+=count($trip->packs);
                  }?>
                  <tr>
                    <td colspan='8'><strong>Paquetes transportados: </strong>{{$counter}}</td>
                  </tr>
                  <tr>
                    <td colspan="8"><strong>Rating: </strong>{{$user->Rating()}}/10</td>
                  </tr>

                  <tr>
                    <td colspan="8"> <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Enviar mensaje<span class="glyphicon glyphicon-chevron-right"></span></a></td>
                  </tr>
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
        <!--El href debe ser cambiando por base_url o similar. Fines de prueba-->
        <a href="http://localhost/ridepack/public/handle_request" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">
            <i class="fa fa-envelope"></i> Enviar mensaje
          </h4>
        </div>
        <div class="modal-body">
          <p>Solicita más detalles</p>
          {{ Form::open( array('action' => array('UsersProfileController@sendMessage', $user->id)) ) }}
            <div class='input-group'>
              <span class='input-group-addon'>
                <i class='fa fa-envelope'></i>
              </span>
              {{ Form::textarea('message', null, array(
                'class' => 'form-control',
                'rows' => '6',
                'required'=>'true')
              ) }}
            </div>
            <br />
            {{ Form::button("<i class='fa fa-share'></i> Enviar", array(
              'type' => 'submit',
              'class' => 'btn btn-primary',
              'name' => 'submit'
            )) }}
          {{ Form::close() }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



  <br><br><br><br><br>
 <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="container text-center">
            <small class="copyright">Desarrollado con <i class="fa fa-heart"></i></small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->     
    <script type="text/javascript" src="{{asset('plugins/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-migrate-1.2.1.min.js')}}"></script>    
    <script type="text/javascript" src="{{asset('plugins/jquery.easing.1.3.js')}}"></script>   
    <script type="text/javascript" src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>     
    <script type="text/javascript" src="{{asset('plugins/jquery-scrollTo/jquery.scrollTo.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('plugins/prism/prism.js')}}"></script>    
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/details-package.js')}}"></script>       
</body>
</html> 
