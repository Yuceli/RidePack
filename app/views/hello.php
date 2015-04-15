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
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body data-spy="scroll">
    
    <!---//Facebook button code-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
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
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item sr-only"><a class="scrollto" href="#home">Home</a></li>
                        <li class="nav-item"><a class="scrollto" href="#home">Nosotros</a></li>
                        <li class="nav-item"><a class="scrollto" href="#features">Caracteristicas</a></li>                        
                        <li class="nav-item last"><a class="scrollto" href="#contact">Contacto</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header-->
    
    <!-- ******PROMO****** -->
    <section id="#home" class="promo section offset-header">
        <div class="container text-center">
            <h2 class="title">Ride<span class="highlight">Pack</span></h2>
            <p class="intro">¿Deseas enviar o transportar algún paquete?</p>
            <div class="btns">
                <a class="btn btn-cta-secondary" href="login">Login</a>
                <a class="btn btn-cta-primary" href="register">Registro</a>
            </div>
            <ul class="meta list-inline">
                <li><br>Registrate y publica cuándo y donde deseas enviar un artículo.</li>
            </ul><!--//meta-->
        </div><!--//container-->
        <div class="social-media">
            <div class="social-media-inner container text-center">
                <ul class="list-inline">
                    <br>
                    <br>
                </ul>
            </div>
        </div>
    </section><!--//promo-->
    
    <!-- ******ABOUT****** --> 
    <section id="home" class="about section">
        <div class="container">
            <h2 class="title text-center">¿Que es RidePack?</h2>
            <p class="intro text-center">RidePack pretende ofrecer un método de contacto para que las personas que tengan necesidad de enviar un paquete y que deseen ahorrar dinero en el envío, puedan buscar y contactar de una manera rápida y sencilla a aquellos viajeros que se adapten a sus necesidades.</p>
            <div class="row">
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Red de confianza</h3>
                        <p>RidePack es una comunidad de confianza que conecta viajeros con personas que tienen la necesidad
                        enviar paquetes a cualquier parte del mundo.</p>
                    </div><!--//content-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Proceso rápido y sencillo</h3>
                        <p>Ofrecemos una alternativa flexible para empresas y personas físicas, mediante
                        la conexión de remitentes con viajeros que esten dispuestos a enviar un paquete
                        a cambio de una recompensa.</p>
                    </div><!--//content-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-crosshairs"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Paquetes en cualquier lugar y momento</h3>
                        <p>¿Deseas enviar algo a un amigo que vive en otra ciudad?¿Tienes espacio libre en tu equipaje y deseas ganar dinero extra?
                        Registrate en RidePack.</p>
                    </div><!--//content-->
                </div><!--//item-->                         
            </div><!--//row-->            
        </div><!--//container-->
    </section><!--//about-->



    <!-- ******FEATURES****** --> 
    <section id="features" class="features section">
        <div class="container text-center">
            <h2 class="title">Características</h2>
            <ul class="feature-list list-unstyled">
                <li><i class="fa fa-check"></i> Seguro</li>
                 <li><i class="fa fa-check"></i> Confiable</li>
                <li><i class="fa fa-check"></i> Sistema de autenticación</li>
                <li><i class="fa fa-check"></i> Comunicacipon interna entre usuarios</li>
            </ul>
        </div><!--//container-->
    </section><!--//features-->



    <!-- ******CONTACT****** --> 
    <section id="contact" class="contact section has-pattern">
        <div class="container">
            <div class="contact-inner">
                <h2 class="title  text-center">Contacto</h2>
                <div class="author-message">                      
                    <div class="profile">
                    </div><!--//profile-->
                   
                <div class="clearfix"></div>
                <div class="info text-center">
                    <ul class="social-icons list-inline">
                        <li><a href="https://twitter.com/Ride_Pack" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/pages/RidePack/1573793126243139" target="_blank"><i class="fa fa-facebook"></i></a></li>  
                        <li class="last"><a href="mailto: yuceli.polanco@gmail.com"><i class="fa fa-envelope"></i></a></li>              
                    </ul>
                </div><!--//info-->
            </div><!--//contact-inner-->
        </div><!--//container-->
    </section><!--//contact-->  
    
      
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

