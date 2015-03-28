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
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="plugins/prism/prism.css">
    <link rel="stylesheet" href="css/login.css">
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="css/styles.css">
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
                        <li class="nav-item"><a class="scrollto" href="login">Login</a></li>
                        <li class="nav-item"><a class="scrollto" href="register">Registro</a></li>                        
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header-->  

<body>
	<div class="container container-reset">
    	<div class="row">
        	<div class="col-sm-6 col-md-4 col-md-offset-4">
            	<div class="account-wall">
                	<div id="my-tab-content" class="tab-content">
            			<div class="tab-pane active" align="center">  
                    {{ Form::open() }}
                      @if (Session::get("error"))
                        {{ Session::get("error") }}<br />
                      @endif
                      @if (Session::get("status"))
                        {{ Session::get("status") }}<br />
                      @endif
                      {{ Form::label("email", "Email:") }}<br />
                      {{ Form::text("email", Input::old("email")) }}<br />
                      <br />
                      {{ Form::submit("Reenviar") }}
                    {{ Form::close() }}
                    <hr class="colorgraph">
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