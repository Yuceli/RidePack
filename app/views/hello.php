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
    
    <!-- ******PROMO****** -->
    <section id="promo" class="promo section offset-header">
        <div class="container text-center">
            <h2 class="title">Ride<span class="highlight">Pack</span></h2>
            <p class="intro">¿Deseas enviar o transportar algún paquete?</p>
            <div class="btns">
                <a class="btn btn-cta-secondary" href="login" target="_blank">Login</a>
                <a class="btn btn-cta-primary" href="register" target="_blank">Registro</a>
            </div>
            <ul class="meta list-inline">
                <li><br>Registrate y publica cuándo y donde deseas enviar un artículo.</li>
            </ul><!--//meta-->
        </div><!--//container-->
        <div class="social-media">
            <div class="social-media-inner container text-center">
                <ul class="list-inline">
                    <li class="twitter-follow"><a href="https://twitter.com/3rdwave_themes" class="twitter-follow-button" data-show-count="false">Follow @3rdwave_themes</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-follow-->
                    <li class="twitter-tweet">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="3rdwave_themes" data-hashtags="bootstrap">Tweet</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </li><!--//twitter-tweet-->
                    <li class="facebook-like">
                         <div class="fb-like" data-href="http://themes.3rdwavemedia.com/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </li><!--//facebook-like-->
                    <!--// Generate github buttons: https://github.com/mdo/github-buttons -->
                    <li class="github-star"><iframe src="http://ghbtns.com/github-btn.html?user=mdo&repo=github-buttons&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe></li>
                    <li class="github-fork"><iframe src="http://ghbtns.com/github-btn.html?user=mdo&repo=github-buttons&type=fork" allowtransparency="true" frameborder="0" scrolling="0" width="53" height="20"></iframe></li>
                    <!--//
                    <li class="github-follow"><iframe src="http://ghbtns.com/github-btn.html?user=mdo&type=follow&count=true"
  allowtransparency="true" frameborder="0" scrolling="0" width="165" height="20"></iframe></li>
                    -->
                </ul>
            </div>
        </div>
    </section><!--//promo-->
    
    <!-- ******ABOUT****** --> 
    <section id="about" class="about section">
        <div class="container">
            <h2 class="title text-center">¿Que es RidePack?</h2>
            <p class="intro text-center">RidePack pretende ofrecer un método de contacto para que las personas que tengan necesidad de enviar un paquete y que deseen ahorrar dinero en el envío, puedan buscar y contactar de una manera rápida y sencilla a aquellos viajeros que se adapten a sus necesidades.</p>
            <div class="row">
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Designed for developers</h3>
                        <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                    </div><!--//content-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Time saver</h3>
                        <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                    </div><!--//content-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-crosshairs"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">UX-centred</h3>
                        <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                    </div><!--//content-->
                </div><!--//item-->           
                <div class="clearfix visible-md"></div>    
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-tablet"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Mobile-friendly</h3>
                        <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                    </div><!--//content-->
                </div><!--//item-->                
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-code"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">Easy to customise</h3>
                        <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                    </div><!--//content-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-6 col-xs-12">
                    <div class="icon-holder">
                        <i class="fa fa-coffee"></i>
                    </div>
                    <div class="content">
                        <h3 class="sub-title">LESS files included</h3>
                        <p>Outline a benefit here. Tell users what your plugin/software can do for them. You can change the icon above to any of the 400+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwesome</a> icons available.</p>
                    </div><!--//content-->
                </div><!--//item-->               
            </div><!--//row-->            
        </div><!--//container-->
    </section><!--//about-->
    
    <!-- ******FEATURES****** --> 
    <section id="features" class="features section">
        <div class="container text-center">
            <h2 class="title">Features</h2>
            <ul class="feature-list list-unstyled">
                <li><i class="fa fa-check"></i> Fully responsive</li>
                <li><i class="fa fa-check"></i> HTML5 + CSS3</li>
                <li><i class="fa fa-check"></i> Built on <a href="http://getbootstrap.com/" target="_blank">Bootstrap 3.3</a></li>
                <li><i class="fa fa-check"></i> 400+ FontAwesome icons</li>
                <li><i class="fa fa-check"></i> 4 colour schemes</li>
                <li><i class="fa fa-check"></i> LESS files included</li>
                <li><i class="fa fa-check"></i> Compatible with all modern browsers</li>
            </ul>
        </div><!--//container-->
    </section><!--//features-->
    
    
    
    
    
      
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

