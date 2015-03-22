<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RidePack</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="plugins/prism/prism.css">
  <!-- Theme CSS -->  
  <link id="theme-style" rel="stylesheet" href="css/styles.css">
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
                        <li class="nav-item"><a class="scrollto" href="#about">Nosotros</a></li>
                        <li class="nav-item"><a class="scrollto" href="#features">Caracteristicas</a></li>                        
                        <li class="nav-item last"><a class="scrollto" href="#contact">Contacto</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header--> 

  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
          <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="login">
              <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
              alt="">
              <hr class="colorgraph">
              {{Form::open(array('url' => 'store', 'class'=>'form-signin'))}}
              @if(Session::has('error_message'))
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong >{{ Session::get('error_message') }}</strong> 
              </div>

              @endif
              <br>
              {{Form::email('email', '',array('class' => 'form-control', 'type' => 'email' ,'placeholder' => 'email' , 'required' => 'required'))}}
              <!--<input type="text" class="form-control" name="email" placeholder="email" required autofocus>-->
              <br>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <p class="text-left"><a align="left" href="request">¿Olvidaste tu contraseña?</a></p>
              <br>
                      <!--<input type="submit" class="btn btn-lg btn-default btn-block" value="Sign In" />
                      <br>-->
                      <div class="col-xs-12 col-md-6"><input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                      {{Form::close()}}
                      <div id="tabs" data-tabs="tabs">
                        <p class="text-center"><a href="register">¿Necesitas una cuenta?</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <br><br>
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