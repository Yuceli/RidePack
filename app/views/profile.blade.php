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
                            <p><strong>Usuario desde: </strong> {{ Auth::user()->created_at->toDateString(); }}  </p>
                            <p><strong>Edad: </strong>{{ Auth::user()->birthdate; }}</p>
                            <input id="city_id" value="{{ Auth::user()->city_id; }}" type="hidden">
                            <p><strong>Pais: </strong><span id="country"> </span></p>
                            <p><strong>Estado: </strong><span id="state"> </span></p>
                            <p><strong>Ciudad: </strong><span id="city"> </span></p>
                            </div>             
                        </div>            
                        <div class="col-xs-12 divider text-center">
                            <a href="management"><button class="btn btn-primary btn-block"><span class="fa fa-plus-circle"></span> Gestionar mis viajes</button></a>
                            <div class="col-xs-12 col-sm-6 emphasis">
                                <h2><strong> {{count(Auth::user()->trips)}} </strong></h2>                    
                                <p><small>Viajes publicados</small></p>
                                <a href="post_travel"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Publicar viaje</button></a>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                                <h2><strong>{{count(Auth::user()->packs)}}</strong></h2>                    
                                <p><small>Paquetes publicados</small></p>
                                <a href="post_package"><button class="btn btn-info btn-block"><span class="fa fa-user"></span> Publicar paquete </button></a>
                            </div>
                        </div>

                        <div class="col-xs-12 divider text-center">
                            <h2>Opciones de la cuenta</h2>
                            <div class="col-xs-12 col-sm-6 emphasis">             
                                <p><small>Eliminar cuenta</small></p>
                                <button class="btn btn-danger btn-block" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="fa fa-plus-circle"></span> Eliminar cuenta</button>
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
                            <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solcitudes paquetes</h4></a></li>
                            <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solicitudes viajes</h4></a></li>
                            <li><a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Editar perfil</h4></a></li>
                        </ul>            
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments-logout">                
                              <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                   <thead>
                                     <th>ID</th>
                                     <th>Descripción</th>
                                     <th>Fecha</th>
                                 </thead>
                                 <tbody>

                                  <tr>
                                    <td>1</td>
                                    <td>Marco se ha postulado para transportar tu paquete</td>
                                    <td>10/12/2015</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Marco se ha postulado para transportar tu paquete</td>
                                    <td>10/12/2015</td>
                                </tr>


                                <tr>
                                    <td>3</td>
                                    <td>Marco se ha postulado para transportar tu paquete</td>
                                    <td>10/12/2015</td>  
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Marco se ha postulado para transportar tu paquete</td>
                                     <td>10/12/2015</td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Marco se ha postulado para transportar tu paquete</td>
                                     <td>10/12/2015</td>
                                </tr>
                            </tbody>
                          </table>
                                <a class="btn btn-info btn-circle text-uppercase pull-right" href="handle_request" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Gestionar solicitudes</a>
                            </div>
                            </div>


                            <div class="tab-pane" id="add-comment">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                   <thead>
                                     <th>ID</th>
                                     <th>Descripción</th>
                                     <th>Fecha</th>
                                 </thead>
                                 <tbody>

                                  <tr>
                                    <td>1</td>
                                    <td>Yussel ha solicitado tus servicios como viajero</td>
                                    <td>10/12/2015</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Yussel ha solicitado tus servicios como viajero</td>
                                    <td>10/12/2015</td>
                                </tr>


                                <tr>
                                    <td>3</td>
                                    <td>Yussel ha solicitado tus servicios como viajero</td>
                                    <td>10/12/2015</td>  
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Yussel ha solicitado tus servicios como viajero</td>
                                     <td>10/12/2015</td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Yussel ha solicitado tus servicios como viajero</td>
                                     <td>10/12/2015</td>
                                </tr>
                            </tbody>
                          </table>
                                <a class="btn btn-info btn-circle text-uppercase pull-right" href="handle_request" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Gestionar solicitudes</a>
                            </div>
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
                                        <label for="newPassword" class="col-sm-2 control-label">Edad</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="age" id="age">
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
        </div>
            

    <!--Nodal para eliminar cuenta del sistema-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                          <h4 class="modal-title custom_align" id="Heading">Eliminar cuenta</h4>
                        </div>
                        <div class="modal-body">

                         <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar su cuenta?</div>

                       </div>
                       <div class="modal-footer ">
                        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
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


    <!--Api google-->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    <script type="text/javascript" src="js/googlePlaces.js"></script>

    <script type="text/javascript">

      window.onload= function(){
        // Input hidden con el city_id
        googlePlaces.inputPlaceID = document.getElementById('city_id');

        // Divs o inputs para mostrar la ciudad, estado y país.
        googlePlaces.outputCity = document.getElementById('city');
        googlePlaces.outputState = document.getElementById('state');
        googlePlaces.outputCountry = document.getElementById('country');

        // Muestra los detalles correspondientes al city_id en el outputCity, outputState y outputCountry.
        googlePlaces.getPlaceDetails();
      };
    </script>

</body>
</html> 
