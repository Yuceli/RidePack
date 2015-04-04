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
          <a class="scrollto" href="#promo">
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
              <li class="nav-item"><a class="scrollto" href="#about">Buscar</a></li>
              <li class="nav-item"><a class="scrollto" href="#features">Enviar paquete</a></li>                        
              <li class="nav-item last"><a class="scrollto" href="#contact">Publicar viaje</a></li>
              <li class="nav-item last"><a class="scrollto" href="{{URL::to('logout')}}">Cerrar sesión</a></li>
              <li class="nav-item last"><a class="scrollto" href=""></a></li>
            </ul><!--//nav-->
          </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
      </div>
    </header><!--//header--> 

    <body>
 <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <div class="container">            
            <h1 class="logo pull-left">
                <a class="scrollto" href="#home">
                    <span class="logo-title">RidePack</span>
                </a>
            </h1><!--//logo-->              
            <nav id="main-nav" class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="{{asset('#navbar-collapse')}}">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item sr-only"><a class="scrollto" href="#home">Home</a></li>
                        <li class="nav-item"><a class="scrollto" href="{{URL::to('logout')}}">Logout</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header-->


    <div class="container container-details">
        <h2>Perfil Viajero/Remitente</h2>
        <div class="row user-menu-container square">
            <div class="col-md-12 user-details">
                <div class="row coralbg white">
                    <div class="col-md-6 no-pad">
                        <div class="user-pad">
                          <?php
                            echo '<h3>'. $user->name . $user->last_name. '<br><small class="white">' .$user->email.'</small></h3>';
                            echo '<h4 class="white"><i class="fa fa-map-marker"></i> Miembro desde: '. $user->created_at->toDateString(). '</h4>';
                            $birthdate=$user->birthdate;
                            $birthday=new DateTime($birthdate);
                            $today= time();
                            $now= new DateTime(date("Y-m-d",$today));
                            $age = $birthday->diff($now)->format('%y');
                            if($age==0){
                            echo '<h4 class="white"><i class="fa fa-birthday-cake"></i> Edad: ? </h4>';
                            }else{
                            echo '<h4 class="white"><i class="fa fa-birthday-cake"></i> Edad: '.$age.' </h4>';
                            }?>
                        </div>
                    </div>
                    <div class="col-md-6 no-pad">
                        <div class="user-image">
                            <img src="https://farm7.staticflickr.com/6163/6195546981_200e87ddaf_b.jpg" class="img-responsive thumbnail">
                        </div>
                    </div>
                </div>
                <div class="row overview">
                    <div class="col-md-6 user-pad text-center">
                        <h3>PAQUETES </h3>
                        <?php
                        echo'<h4>'.count($user->packs).'</h4>';
                        ?>
                    </div>
                    <div class="col-md-6 user-pad text-center">
                        <h3>VIAJES</h3>
                        <?php
                        echo'<h4>'.count($user->trips).'</h4>';
                        ?>
                    </div>
                </div>
            </div>    
        </div>
    </div>

    <!-Tabla de objetos -->
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Objetos a enviar:</h3>
          </div>
          <div class="panel-body">
            <div class="row">                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td>Lugar de salida</td>
                        <td>Lugar de llegada</td>
                        <td>Fecha de salida</td>
                        <td>Fecha de entrada</td>
                        <td>Peso maximo:</td>
                        <td>Volumen</td> 
                      </tr>
                  <?php
                  foreach($user->packs as $pack){
                        echo '<td>';
                        echo "$pack->title";
                        echo '</td><td>';
                        echo "$pack->from_city";
                        echo '</td><td>';
                        echo "$pack->to_city";
                        echo '</td><td>';
                        echo "$pack->sending_date";
                        echo'</td><td>';
                        echo "$pack->arrival_date";
                        echo'</td><td>';
                        echo "$pack->weight";
                        echo'</td><td>';
                        echo "$pack->volume";
                        echo'</td>
                      </tr>';
                    };?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

    <!-Tabla de viajes -->


        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Viajes a llevar acabo:</h3>
          </div>
          <div class="panel-body">
            <div class="row">                
                <div class=" col-md-9 col-lg-9 "> 
                   <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Lugar de salida</td>
                        <td>Lugar de llegada</td>
                        <td>Fecha de salida</td>
                        <td>Fecha de entrada</td>
                        <td>Peso maximo</td>
                        <td>Volumen</td> 
                        <td>Transporte</td> 
                      </tr>
                  <?php
                  foreach($user->trips as $trip){
                        echo '<td>';
                        echo "$trip->departure_city";
                        echo '</td><td>';
                        echo "$trip->arrival_city";
                        echo '</td><td>';
                        echo "$trip->departure_date";
                        echo'</td><td>';
                        echo "$trip->arrival_date";
                        echo'</td><td>';
                        echo "$trip->max_weight";
                        echo'</td><td>';
                        echo "$trip->max_volume";
                        echo'</td><td>';
                        echo "$trip->transport";
                        echo'</td>
                      </tr>';
                    };?>
                  </tbody>
                </table>
                </table>
              </div>
            </div>
          </div>
        </div>




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
