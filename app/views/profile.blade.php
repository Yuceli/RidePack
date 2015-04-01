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
    <link id="theme-style" rel="stylesheet" href="css/profile.css">
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


    <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 container-profile">
                <ol class="breadcrumb">
                    <li><a href="#">RidePack</a></li>
                    <li class="active">Perfil de usuario</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 container-profile">
                <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                            <h2>{{ Auth::user()->name; }}  {{ Auth::user()->last_name; }}</h2>
                            <p><strong>Email: </strong> {{ Auth::user()->email; }} </p>
                            <p><strong>Usuario desde: </strong> 12/02/2015 </p>
                            <p><strong>Cumpleaños: </strong>2/11/90</p>
                            <p><strong>Genero: </strong>Femenino</p>
                            <p><strong>Pais: </strong>México</p>
                            <p><strong>Estado: </strong>Yucatán</p>
                            <p><strong>Ciudad: </strong>Mérida</p>
                            </div>             
                            <div class="col-xs-12 col-sm-4 text-center">
                                <figure>
                                    <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle img-responsive">
                                    <figcaption class="ratings">
                                        <p>Ratings
                                            <a href="#">
                                                <span class="fa fa-star"></span>
                                            </a>
                                            <a href="#">
                                                <span class="fa fa-star"></span>
                                            </a>
                                            <a href="#">
                                                <span class="fa fa-star"></span>
                                            </a>
                                            <a href="#">
                                                <span class="fa fa-star"></span>
                                            </a>
                                            <a href="#">
                                                <span class="fa fa-star-o"></span>
                                            </a> 
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>            
                        <div class="col-xs-12 divider text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                                <h2><strong> 20 </strong></h2>                    
                                <p><small>Viajes publicados</small></p>
                                <a href="postTrip"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Publicar viaje</button></a>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                                <h2><strong>245</strong></h2>                    
                                <p><small>Paquetes publicados</small></p>
                                <a href="postPackage"><button class="btn btn-info btn-block"><span class="fa fa-user"></span> Publicar paquete </button></a>
                            </div>
                        </div>

                        <div class="col-xs-12 divider text-center">
                            <h2>Opciones de la cuenta</h2>
                            <div class="col-xs-12 col-sm-6 emphasis">             
                                <p><small>Eliminar cuenta</small></p>
                                <button class="btn btn-danger btn-block"><span class="fa fa-plus-circle"></span> Eliminar cuenta</button>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">           
                                <p><small>Restablecer contraseña</small></p>
                                <a href="request"><button class="btn btn-warning btn-block"><span class="fa fa-user"></span> Restablecer contraseña </button></a>
                            </div>
                        </div>
                    </div>                 
                </div>                     


                <div class="col-md-6">
                    <div class="page-header">
                        <h3 class="reviews">Opciones de perfil</h3>
                    </div>
                    <div class="comment-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solicitudes</h4></a></li>
                            <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Mensajes</h4></a></li>
                            <li><a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Editar perfil</h4></a></li>
                        </ul>            
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments-logout">                
                                <ul class="media-list">
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <h4 class="media-heading text-uppercase reviews">Marco </h4>
                                                <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                </ul>
                                                <p class="media-comment">
                                                    Marco se ha postulado para enviar tu paquete
                                                </p>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Aceptar</a>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Rechazar</a>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Ver perfil</a>
                                            </div>              
                                        </div>
                                    </li>          

                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/128.jpg" alt="profile">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <h4 class="media-heading text-uppercase reviews">Kriztine</h4>
                                                <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                </ul>
                                                <p class="media-comment">
                                                    Yehhhh... Thanks for sharing.
                                                </p>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Aceptar</a>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Rechazar</a>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Ver perfil</a>
                                            </div>              
                                        </div>
                                    </li>
                                </ul> 
                                <a class="btn btn-info btn-circle text-uppercase pull-right" href="inbox" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Ver más solicitudes</a>
                            </div>


                            <div class="tab-pane" id="add-comment">
                                <li class="media">
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">Kriztine</h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd">22</li>
                                                <li class="mm">09</li>
                                                <li class="aaaa">2014</li>
                                            </ul>
                                            <p class="media-comment">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Quod sapiente culpa fuga, non laudantium atque, quasi quos
                                                eius at quibusdam debitis totam inventore asperiores porro,
                                                animi odio! Quaerat, illo, rem!
                                            </p>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Responder</a>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Eliminar</a>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Ver perfil</a>
                                        </div>              
                                    </div>
                                    <div class="collapse" id="replyTwo">
                                        <ul class="media-list">
                                            <li class="media media-replied">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jackiesaik/128.jpg" alt="profile">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Lizz</h4>
                                                        <ul class="media-date text-uppercase reviews list-inline">
                                                            <li class="dd">22</li>
                                                            <li class="mm">09</li>
                                                            <li class="aaaa">2014</li>
                                                        </ul>
                                                        <p class="media-comment">
                                                            Classy!
                                                        </p>
                                                        <a class="btn btn-info btn-circle text-uppercase" href="" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                    </div>              
                                                </div>
                                            </li>
                                        </ul>  
                                    </div>
                                </li>



                                <li class="media">
                                    <div class="media-body">
                                        <div class="well well-lg">
                                            <h4 class="media-heading text-uppercase reviews">Kriztine</h4>
                                            <ul class="media-date text-uppercase reviews list-inline">
                                                <li class="dd">22</li>
                                                <li class="mm">09</li>
                                                <li class="aaaa">2014</li>
                                            </ul>
                                            <p class="media-comment">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Quod sapiente culpa fuga, non laudantium atque, quasi quos
                                                eius at quibusdam debitis totam inventore asperiores porro,
                                                animi odio! Quaerat, illo, rem!
                                            </p>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Responder</a>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Eliminar</a>
                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Ver perfil</a>
                                        </div>              
                                    </div>
                                    <div class="collapse" id="replyTwo">
                                        <ul class="media-list">
                                            <li class="media media-replied">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jackiesaik/128.jpg" alt="profile">
                                                </a>
                                                <div class="media-body">
                                                    <div class="well well-lg">
                                                        <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Lizz</h4>
                                                        <ul class="media-date text-uppercase reviews list-inline">
                                                            <li class="dd">22</li>
                                                            <li class="mm">09</li>
                                                            <li class="aaaa">2014</li>
                                                        </ul>
                                                        <p class="media-comment">
                                                            Classy!
                                                        </p>
                                                        <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                    </div>              
                                                </div>
                                            </li>
                                        </ul>  
                                    </div>
                                </li>
                             <a class="btn btn-info btn-circle text-uppercase pull-right" href="inbox" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Ver más mensajes</a>  
                            </div>



                            <div class="tab-pane" id="account-settings">
                                <form action="#" method="post" class="form-horizontal" id="accountSetForm" role="form">
                                    <div class="form-group">
                                        <label for="avatar" class="col-sm-2 control-label">Foto de perfil</label>
                                        <div class="col-sm-10">                                
                                            <div class="custom-input-file">
                                                <label class="uploadPhoto">
                                                    Cambiar
                                                    <input type="file" class="change-avatar" name="avatar" id="avatar">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nickName" class="col-sm-2 control-label">Apellido</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="lastname" id="lastname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="newPassword" class="col-sm-2 control-label">Fecha de nacimiento</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="birthday" id="birthday">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="confirmPassword" class="col-sm-2 control-label">Buscar Ciudad</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="city" id="city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword" class="col-sm-2 control-label">Ciudad</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="city" id="city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword" class="col-sm-2 control-label">Estado</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="city" id="city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword" class="col-sm-2 control-label">Pais</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="city" id="city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">                    
                                            <button class="btn btn-primary btn-circle text-uppercase" type="submit" id="submit">Guardar cambios</button>
                                        </div>
                                    </div>            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1" id="login">
                    <div class="page-header">
                        <h3 class="reviews">Leave your comment</h3>
                        <div class="logout">
                            <button class="btn btn-default btn-circle text-uppercase" type="button" onclick="$('#login').hide(); $('#logout').show()">
                                <span class="glyphicon glyphicon-off"></span> Login                    
                            </button>                
                        </div>
                    </div>
                    <div class="comment-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#comments-login" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                            <li><a href="#add-comment-disabled" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
                            <li><a href="#new-account" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Create an account</h4></a></li>
                        </ul>            
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments-login">                
                                <ul class="media-list">
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <h4 class="media-heading text-uppercase reviews">Marco</h4>
                                                <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                </ul>
                                                <p class="media-comment">
                                                    Great snippet! Thanks for sharing.
                                                </p>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyThree"><span class="glyphicon glyphicon-comment"></span> 2 comments</a>
                                            </div>              
                                        </div>
                                        <div class="collapse" id="replyThree">
                                            <ul class="media-list">
                                                <li class="media media-replied">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg" alt="profile">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="well well-lg">
                                                            <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> The Hipster</h4>
                                                            <ul class="media-date text-uppercase reviews list-inline">
                                                                <li class="dd">22</li>
                                                                <li class="mm">09</li>
                                                                <li class="aaaa">2014</li>
                                                            </ul>
                                                            <p class="media-comment">
                                                                Nice job Maria.
                                                            </p>
                                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                        </div>              
                                                    </div>
                                                </li>
                                                <li class="media media-replied" id="replied">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object img-circle" src="https://pbs.twimg.com/profile_images/442656111636668417/Q_9oP8iZ.jpeg" alt="profile">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="well well-lg">
                                                            <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Mary</h4></h4>
                                                            <ul class="media-date text-uppercase reviews list-inline">
                                                                <li class="dd">22</li>
                                                                <li class="mm">09</li>
                                                                <li class="aaaa">2014</li>
                                                            </ul>
                                                            <p class="media-comment">
                                                                Thank you Guys!
                                                            </p>
                                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                        </div>              
                                                    </div>
                                                </li>
                                            </ul>  
                                        </div>
                                    </li>          
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kurafire/128.jpg" alt="profile">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <h4 class="media-heading text-uppercase reviews">Nico</h4>
                                                <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                </ul>
                                                <p class="media-comment">
                                                    I'm looking for that. Thanks!
                                                </p>
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/80lNjkcp6gI" allowfullscreen></iframe>
                                                </div>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                            </div>              
                                        </div>
                                    </li>
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/128.jpg" alt="profile">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <h4 class="media-heading text-uppercase reviews">Kriztine</h4>
                                                <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                </ul>
                                                <p class="media-comment">
                                                    Yehhhh... Thanks for sharing.
                                                </p>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyFour"><span class="glyphicon glyphicon-comment"></span> 1 comment</a>
                                            </div>              
                                        </div>
                                        <div class="collapse" id="replyFour">
                                            <ul class="media-list">
                                                <li class="media media-replied">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jackiesaik/128.jpg" alt="profile">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="well well-lg">
                                                            <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Lizz</h4>
                                                            <ul class="media-date text-uppercase reviews list-inline">
                                                                <li class="dd">22</li>
                                                                <li class="mm">09</li>
                                                                <li class="aaaa">2014</li>
                                                            </ul>
                                                            <p class="media-comment">
                                                                Classy!
                                                            </p>
                                                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                        </div>              
                                                    </div>
                                                </li>
                                            </ul>  
                                        </div>
                                    </li>
                                </ul> 
                            </div>
                            <div class="tab-pane" id="add-comment-disabled">
                                <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <span aria-hidden="true">×</span><span class="sr-only">Close</span>                        
                                    </button>
                                    <strong>Hey!</strong> If you already have an account <a href="#" class="alert-link">Login</a> now to make the comments you want. If you do not have an account yet you're welcome to <a href="#" class="alert-link"> create an account.</a>
                                </div>
                                <form action="#" method="post" class="form-horizontal" id="commentForm" role="form"> 
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Comment</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="addComment" id="addComment" rows="5" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadMedia" class="col-sm-2 control-label">Upload media</label>
                                        <div class="col-sm-10">                    
                                            <div class="input-group">
                                                <div class="input-group-addon">http://</div>
                                                <input type="text" class="form-control" name="uploadMedia" id="uploadMedia" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">                    
                                            <button class="btn btn-success btn-circle text-uppercase disabled" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                                        </div>
                                    </div>            
                                </form>
                            </div>
                            <div class="tab-pane" id="new-account">
                                <form action="#" method="post" class="form-horizontal" id="commentForm" role="form">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email" required>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                    </div>                         
                                    <div class="form-group">
                                        <div class="checkbox">                
                                            <label for="agreeTerms" class="col-sm-offset-2 col-sm-10">
                                                <input type="checkbox" name="agreeTerms" id="agreeTerms"> I agree all <a href="#">Terms & Conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">                    
                                            <button class="btn btn-primary btn-circle text-uppercase" type="submit" id="submit">Create an account</button>
                                        </div>
                                    </div>            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

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
    <script type="text/javascript" src="js/details-package.js"></script>       
</body>
</html> 
