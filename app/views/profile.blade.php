  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>RidePack</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="plugins/prism/prism.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/upcoming-trips.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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

    
    <div class="container-fluid">
      <div class="row">
        <br><br><br><br><br>
       <div class="col-md-12 toppad" >


        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Información personal: {{ Auth::user()->name; }}  {{ Auth::user()->last_name; }} </h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>

                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>

                        <td> {{ Auth::user()->name; }}</td>
                      </tr>
                      <tr>
                        <td>Apellido</td>
                        <td>{{ Auth::user()->last_name; }}</td>
                      </tr>
                      <tr>
                        <td>Fecha de nacimiento</td>
                        <td>{{ Auth::user()->birthdate; }}</td>
                      </tr>
                      <tr>
                        <td>Pais</td>
                        <td>Mexico</td>
                      </tr>
                      <tr>
                        <td>Ciudad</td>
                        <td>Mérida</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{ Auth::user()->email; }}</td>
                      

                  </tbody>
                </table>

                <a href="editProfile" class="btn btn-primary">Editar información personal</a>
      
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <a href="message" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
            <span class="pull-right">
              <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </span>
          </div>

        </div>
      </div>
    </div>
  </div>

   
  <br><br><br>
  <!-- ******FOOTER****** --> 
  <footer class="footer">
    <div class="container text-center">
      <small class="copyright">Desarrollado con <i class="fa fa-heart"></i> por desarrolladores de RidePack</small>
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