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
  <link rel="shortcut icon" href="img/favicon.ico">  
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
  <!-- Global CSS -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Plugins CSS -->    
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="plugins/prism/prism.css">
  <!-- Theme CSS -->  
  <link id="theme-style" rel="stylesheet" href="css/styles.css">
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
            <li class="active nav-item sr-only"><a class="scrollto" href="#promo">Home</a></li>
            <li class="nav-item"><a class="scrollto" href="#buscar">Buscar</a></li>
            <li class="nav-item"><a class="scrollto" href="#paquete">Enviar paquete</a></li>
            <li class="nav-item last"><a class="scrollto" href="#viaje">Publicar viaje</a></li>
            <li class="nav-item last"><a class="scrollto" href="{{URL::to('logout')}}">Cerrar sesión</a></li>
            <li class="nav-item last"><a class="scrollto" href=""></a></li>
          </ul><!--//nav-->
        </div><!--//navabr-collapse-->
      </nav><!--//main-nav-->
    </div>
  </header><!--//header--> 

  <br><br><br><br><br>
  <div class="container">
    @if(Session::has('message'))
      <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="#">RidePack</a></li>
          <li class="active">Detalles del paquete</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>
              <img class="img-circle img-thumbnail" src="http://bootdey.com/img/Content/user_3.jpg">
              Yussel Paredes
            </h3>
          </div>
          <div class="panel-body"> 
            <div class="table-responsive">
              <table class="table">
                
                <thead>
                  <tr>
                    <th>Paquete</th>
                    <th>Detalles</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td><img src="http://www.hangerworld.co.uk/blog/wp-content/uploads/2013/12/vintage1.jpg" class="img-cart"></td>
                    <td>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <strong>Volumen:</strong><p>Pequeño</p> 
                      <strong>Peso:</strong><p>2 kg</p>
                      <strong>Recompensa:</strong><p>$234.00</p>  
                    </td>
                  </tr>
                  
                  <tr>
                    <td colspan="8"><strong>De: </strong>Mérida</td>
                  </tr>
                  
                  <tr>
                    <td colspan="8"><strong>Hacia: </strong>México</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Fecha de entrega: </strong>12/11/2015</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Observaciones: </strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </div>
        </div>
        <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
      </div>

      <div class="col-md-3">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>Opciones de contacto</h3>
          </div>
          <div class="panel-body"> 
            <div class="table-responsive">
              <table class="table">

                <tbody>
                  <tr>
                    <td colspan="8">
                      <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Enviar mensaje
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="8"> <a href="#" class="btn btn-primary pull-right">Postularme a paquete<span class="glyphicon glyphicon-chevron-right"></span></a></td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Viajes publicados: </strong>4 viajes</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Paquetes transportados: </strong>10 paquetes</td>
                  </tr>
                  
                  <tr>
                    <td colspan="8"><strong>Valoraciones: </strong>8/10</td>
                  </tr>
                </tbody>
              
              </table>
            </div>
          </div>
        </div>
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
          <p>Solicita más detalles sobre el paquete a transportar</p>
          {{ Form::open( array('action' => 'DetailsPackageController@sendMessage') ) }}
            <div class='input-group'>
              <span class='input-group-addon'>
                <i class='fa fa-envelope'></i>
              </span>
              {{ Form::textarea('message', null, array(
                'class' => 'form-control',
                'rows' => '6')
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
  <script type="text/javascript" src="plugins/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="plugins/jquery-migrate-1.2.1.min.js"></script>    
  <script type="text/javascript" src="plugins/jquery.easing.1.3.js"></script>   
  <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>     
  <script type="text/javascript" src="plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script> 
  <script type="text/javascript" src="plugins/prism/prism.js"></script>    
  <script type="text/javascript" src="js/main.js"></script>       
</body>
</html>