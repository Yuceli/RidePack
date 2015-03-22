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
  <link rel="stylesheet" href="css/login.css">
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
          </ul><!--//nav-->
        </div><!--//navabr-collapse-->
      </nav><!--//main-nav-->
    </div>
  </header><!--//header--> 


  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Editar perfil </h2>
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
             <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nombre" tabindex="1">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Apellido" tabindex="2">
            </div>
          </div>
        </div>
      <div class="form-group">
        <input type="date" name="fecha" id="fecha" class="form-control input-lg" placeholder="Fecha de nacimiento" tabindex="3">
      </div>
      <div class="form-group">
        <input type="text" name="genero" id="genero" class="form-control input-lg" placeholder="Género" tabindex="4">
      </div>
      <div class="form-group">
        <input type="text" name="pais" id="pais" class="form-control input-lg" placeholder="Pais" tabindex="4">
      </div>
      <div class="form-group">
        <input type="ciudad" name="ciudad" id="ciudad" class="form-control input-lg" placeholder="Ciudad" tabindex="4">
      </div>
       <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required="required" tabindex="5">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" required="required" placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
      </div>
     
      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-2"><input type="submit" value="Guardar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        
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