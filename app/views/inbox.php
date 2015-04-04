<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content=""> 
  <title>RidePack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="plugins/prism/prism.css">
  <!-- Theme CSS -->  
  <link id="theme-style" rel="stylesheet" href="css/styles.css">
  <link id="theme-style" rel="stylesheet" href="css/profile.css">
</head>
<body>

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
            <li class="nav-item active"><a href="profile">Perfil</a></li>
            <li class="nav-item"><a href="search">Buscar</a></li>
            <li class="nav-item"><a href="post_package">Publicar paquete</a></li>                        
            <li class="nav-item"><a href="post_travel">Publicar viaje</a></li>
            <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
          </ul><!--//nav-->
        </div><!--//navabr-collapse-->
      </nav><!--//main-nav-->
    </div>
  </header><!--//header--> 

  <br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 container-profile">
        <ol class="breadcrumb">
          <li><a href="#">RidePack</a></li>
          <li class="active">Inbox</li>
        </ol>
      </div>
    </div>



    <div class="panel panel-info panel-shadow">
      <div class="panel-heading">
        <h3>Inbox: (Nombre usuario)</h3>
      </div>
      <div class="panel-body"> 
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12" id="logout">
              <div class="comment-tabs">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Mensajes recibidos</h4></a></li>
                  <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Mensajes enviados</h4></a></li>
                  <li><a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solicitudes</h4></a></li>
                </ul>            
                <div class="tab-content">
                  <div class="tab-pane active" id="comments-logout">                
                    <ul class="media-list">
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/48.jpg" alt="profile">
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
                              Great snippet! Thanks for sharing.
                            </p>
                            <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Contestar</a>
                          </div>              
                        </div>


                        <li class="media">
                          <a class="pull-left" href="#">
                            <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/48.jpg" alt="profile">
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
                              <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Contestar</a>
                            </div>              
                          </div>
                        </li>
                      </ul> 
                    </div>
                    <div class="tab-pane" id="add-comment">
                      <div class="tab-pane active" id="comments-logout">                
                        <ul class="media-list">
                          <li class="media">
                            <a class="pull-left" href="#">
                              <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/48.jpg" alt="profile">
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
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                  Magnam illum minus officia quasi qui soluta earum nihil enim ullam unde,
                                  consectetur, ipsa, ab! Voluptatem, fuga, eum placeat pariatur quae eveniet.
                                </p>
                                <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Eliminar</a>
                              </div>              
                            </div>


                            <li class="media">
                              <a class="pull-left" href="#">
                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/48.jpg" alt="profile">
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Quos libero vitae labore ex consequatur voluptate eos consequuntur.
                                    Minima similique esse sed, sit mollitia iure ut, nemo tenetur, fuga eius ullam!
                                  </p>
                                  <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Eliminar</a>
                                </div>              
                              </div>
                            </li>
                          </ul> 
                        </div>
                      </div>

                      <div class="tab-pane" id="account-settings">
                        <div class="tab-pane active" id="comments-logout">                
                          <ul class="media-list">
                            <li class="media">
                              <a class="pull-left" href="#">
                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/48.jpg" alt="profile">
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Magnam illum minus officia quasi qui soluta earum nihil enim ullam unde,
                                    consectetur, ipsa, ab! Voluptatem, fuga, eum placeat pariatur quae eveniet.
                                  </p>
                                  <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Eliminar</a>
                                </div>              
                              </div>


                              <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/48.jpg" alt="profile">
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
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                      Quos libero vitae labore ex consequatur voluptate eos consequuntur.
                                      Minima similique esse sed, sit mollitia iure ut, nemo tenetur, fuga eius ullam!
                                    </p>
                                    <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Eliminar</a>
                                  </div>              
                                </div>
                              </li>
                            </ul> 
                          </div>
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


                        <br><br><br>
                        <!-- ******FOOTER****** --> 
                        <footer class="footer">
                          <div class="container text-center">
                            <small class="copyright">Desarrollado con <i class="fa fa-heart"></i></small>
                          </div><!--//container-->
                        </footer><!--//footer-->


                        <!-- Javascript -->          
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                        <!-- Latest compiled and minified JavaScript -->
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
                        <script type="text/javascript" src="plugins/jquery-migrate-1.2.1.min.js"></script>    
                        <script type="text/javascript" src="plugins/jquery.easing.1.3.js"></script>   

                        <script type="text/javascript" src="plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script> 
                        <script type="text/javascript" src="plugins/prism/prism.js"></script>    
                        <script type="text/javascript" src="js/main.js"></script>  
                      </body>
                      </html>