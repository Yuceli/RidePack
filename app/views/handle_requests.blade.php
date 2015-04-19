<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content=""> 
  <title>RidePack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="plugins/prism/prism.css">
  <!-- Theme CSS -->  
  <link id="theme-style" rel="stylesheet" href="css/styles.css">
  <link id="theme-style" rel="stylesheet" href="css/profile.css">
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
            <li class="active nav-item sr-only"><a class="scrollto" href="#promo">Home</a></li>
            <li class="nav-item active"><a href="profile">Perfil</a></li>
            <li class="nav-item"><a href="search">Buscar</a></li>
            <li class="nav-item"><a href="post_package">Publicar paquete</a></li>                        
            <li class="nav-item"><a href="post_travel">Publicar viaje</a></li>
            <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
            <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/48.jpg" alt="profile">
          </ul><!--//nav-->
        </div><!--//navabr-collapse-->
      </nav><!--//main-nav-->
    </div>
  </header><!--//header--> 

  <br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 container-profile">
        <ol class="breadcrumb">
          <li><a href="#">RidePack</a></li>
          <li class="active">Gestor de solicitudes</li>
        </ol>
      </div>
    </div>



    <div class="panel panel-info panel-shadow">
      <div class="panel-heading">
        <h3>Gestor de solicitudes</h3>
      </div>
      <div class="panel-body"> 
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12" id="logout">
              <div class="comment-tabs">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solicitudes de paquetes</h4></a></li>
                  <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solicitudes de viajes</h4></a></li>
                  <li><a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solicitudes rechazadas/aceptadas</h4></a></li>
                </ul>            
                <div class="tab-content">
                  <div class="tab-pane active" id="comments-logout">                
                    <div class="table-responsive">
                      <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                          <th>ID</th>
                          <th>Fecha</th>
                          <th>Descripción</th>
                          <th>Ver pefil</th>
                          <th>Aceptar</th>
                          <th>Rechazar</th>
                        </thead>
                        <tbody>
                          @foreach($requests as $request)
                            <?php $user=User::findorFail($request->requestable_id) ?>
                            @if($request->status=='onhold')
                          <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->created_at}}</td>
                            <td>{{$user->name." se ha postulado para transportar tu paquete"}}</td>
                            <td><button class="btn btn-primary btn-xs"><span class="fa fa-user"></span></button></td>
                            <td><button class="btn btn-primary btn-xs" onclick=$request><span class="fa fa-check"></span></button></td>
                            <td><button class="btn btn-danger btn-xs"><span class="fa fa-times"></span></button></td>
                          </tr>
                          @else
                          @endif 
                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="add-comment">
                    <div class="tab-pane active" id="comments-logout">                
                      <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">

                          <thead>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Ver perfil</th>
                            <th>Aceptar</th>
                            <th>Borrar</th>
                          </thead>
                          <tbody>

                            <tr>
                              <td>1</td>
                              <td>12/02/2015</td>
                              <td>Yussel ha solicitado tus servicios como viajero</td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-user"></span></button></td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-check"></span></button></td>
                              <td><button class="btn btn-danger btn-xs"><span class="fa fa-times"></span></button></td>
                            </tr>

                            <tr>
                              <td>2</td>
                              <td>12/02/2015</td>
                              <td>Yussel ha solicitado tus servicios como viajero</td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-user"></span></button></td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-check"></span></button></td>
                              <td><button class="btn btn-danger btn-xs"><span class="fa fa-times"></span></button></td>
                            </tr>


                            <tr>
                              <td>3</td>
                              <td>12/02/2015</td>
                              <td>Yussel ha solicitado tus servicios como viajero</td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-user"></span></button></td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-check"></span></button></td>
                              <td><button class="btn btn-danger btn-xs"><span class="fa fa-times"></span></button></td>
                            </tr>



                            <tr>
                              <td>4</td>
                              <td>12/02/2015</td>
                              <td>Yussel ha solicitado tus servicios como viajero</td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-user"></span></button></td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-check"></span></button></td>
                              <td><button class="btn btn-danger btn-xs"><span class="fa fa-times"></span></button></td>
                            </tr>


                            <tr>
                              <td>5</td>
                              <td>12/02/2015</td>
                              <td>Yussel ha solicitado tus servicios como viajero</td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-user"></span></button></td>
                              <td><button class="btn btn-primary btn-xs"><span class="fa fa-check"></span></button></td>
                              <td><button class="btn btn-danger btn-xs"><span class="fa fa-times"></span></button></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="account-settings">     
                    <div class="tab-pane active" id="comments-logout">


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <br><br><br>
  <!-- ******FOOTER****** --> 
  <footer class="footer">
    <div class="container text-center">
      <small class="copyright">Desarrollado con <i class="fa fa-heart"></i></small>
    </div><!--//container-->
  </footer><!--//footer-->


  <!-- Javascript -->          
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="plugins/jquery-migrate-1.2.1.min.js"></script>    
  <script type="text/javascript" src="plugins/jquery.easing.1.3.js"></script>   

  <script type="text/javascript" src="plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script> 
  <script type="text/javascript" src="plugins/prism/prism.js"></script>    
  <script type="text/javascript" src="js/main.js"></script>  
</body>
</html>