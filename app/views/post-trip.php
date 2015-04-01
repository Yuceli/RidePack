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

    <br><br><br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Publica tu viaje</h2>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <select class="form-control input-lg" id="status" name="status">
                  <option>Estoy viajando...</option>
                  <option>Via Terestre</option>
                  <option>Via Aerea</option>
                  <option>Via Maritima</option>
                </select>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
               <select class="form-control input-lg" id="status" name="status">
                <option>Puedo transportar un paquete...</option>
                <option>Extra pequeño</option>
                <option>Pequeño</option>
                <option>Mediano</option>
                <option>Grande</option>
                <option>Extra-Grande</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input type="number" name="quantity" min="1" max="15" class="form-control input-lg" placeholder="Peso en Kg" required="required" tabindex="5">
        </div>  
        <div class="form-group">
          <input type="text" name="ciudad_salida" class="form-control input-lg" placeholder="Ciudad de salida" tabindex="3">
        </div>
        <div class="form-group">
          <input type="text" name="ciudad_destino"  class="form-control input-lg" placeholder="Ciudad de destino" tabindex="4">
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="date" name="fecha_salida" id="date" class="form-control input-lg" placeholder="Fecha" required="required" tabindex="5">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
             <input type="date" name="fecha_llegada" id="date" class="form-control input-lg" placeholder="Fecha" required="required" tabindex="5">
           </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <input type="file" name="file" id="date" class="form-control input-lg" placeholder="file" required="required">
           </div>
         </div>
       </div>
       <div class="row">
        <div class="col-md-12">
          <textarea class="form-control input-lg" placeholder="Observaciones y comentarios" rows="3"></textarea>
        </div>
      </div>
    </div>
    
    <div class="container">
      <hr class="colorgraph">
      <div class="row">
        <div class="col-md-6  col-sm-offset-3">
          <input type="submit" value="Publicar mi viaje" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<br><br>
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