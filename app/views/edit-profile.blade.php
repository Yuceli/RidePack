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

        {{Form::model(Auth::user(),array('id'=>'editForm'))}}
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
             {{Form::text('name', null, array('id'=>'name','class'=>'form-control input-lg','placeholder'=>'Nombre','tabindex'=>'1','required'=>'true'))}}
             <div id ="name_error">{{ $errors->first('name') }}</div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::text('last_name', null, array('id'=>'last_name','class'=>'form-control input-lg','placeholder'=>'Apellido','tabindex'=>'2','required'=>'true'))}}
              <div id ="last_name_error">{{ $errors->first('last_name') }}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::text('birthdate', null, array('id'=>'birthdate','class'=>'form-control input-lg','placeholder'=>'Fecha de nacimiento (aaaa-mm-dd)','tabindex'=>'3'))}}
              <div id ="birthdate_error">{{ $errors->first('birthdate') }}</div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::text('phone', null, array('id'=>'phone','class'=>'form-control input-lg','placeholder'=>'Teléfono','tabindex'=>'4'))}}
              <div id ="phone_error">{{ $errors->first('phone') }}</div>
            </div>
          </div>
        </div>

        <div class="form-group">
          {{Form::text('search_city', null, array('id'=>'search_city','class'=>'form-control input-lg','placeholder'=>'Buscar ciudad','tabindex'=>'5'))}}
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('city', null, array('id'=>'city','class'=>'form-control input-lg', 'readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('state', null, array('id'=>'state','class'=>'form-control input-lg', 'readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('country', null, array('id'=>'country','class'=>'form-control input-lg', 'readonly'=>true))}}
            </div>
          </div>
        </div>

         <div class="form-group">
          {{Form::email('email', null, array('id'=>'email','class'=>'form-control input-lg', 'placeholder'=>'E-mail','tabindex'=>'6','required'=>'true'))}} 
          <div id ="email_error">{{ $errors->first('email') }}</div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::password('password', array('id'=>'password','class'=>'form-control input-lg','placeholder'=>'Nueva Contraseña','tabindex'=>'7'))}}
              <div id ="password_error">{{ $errors->first('password') }}</div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::password('password_confirmation', array('id'=>'password_confirmation','class'=>'form-control input-lg','placeholder'=>'Confirmar contraseña','tabindex'=>'8'))}}
              <div id ="password_confirmation_error">{{ $errors->first('password_confirmation ') }}</div>
            </div>
          </div>
        </div>

        {{Form::hidden('city_id', null, array('id'=>'city_id'))}}
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-2">
            {{Form::submit('Guardar', array('class'=>'btn btn-primary btn-block btn-lg','tabindex'=>'9'))}}
          </div>
        </div>

        {{Form::close()}}
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

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    <script type="text/javascript" src="js/googlePlaces.js"></script>

    <script type="text/javascript">

      window.onload= function(){
        googlePlaces.initAutocomplete(document.getElementById('search_city'));

        googlePlaces.inputPlaceID = document.getElementById('city_id');

        googlePlaces.outputCity = document.getElementById('city');
        googlePlaces.outputState = document.getElementById('state');
        googlePlaces.outputCountry = document.getElementById('country');

        googlePlaces.getPlaceDetails();
      };
    </script>

  </body>
  </html>