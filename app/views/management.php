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

  <br><br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="#">RidePack</a></li>
          <li class="active">Gestión de paquetes y viajes</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>
              <img class="img-circle img-thumbnail" src="http://bootdey.com/img/Content/user_3.jpg">
              Yussel Paredes
            </h3>
          </div>
          <div class="panel-body"> 
            <div class="table-responsive">
              <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mis viajes</a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Mis paquetes</a></li>
                  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Dummy</a></li>
                  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Dummy</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home"> 
                          <h4>Viajes publicados</h4>
                          <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">

                             <thead>
                               <th>ID</th>
                               <th>Fecha publicación</th>
                               <th>Salida</th>
                               <th>Destino</th>
                               <th>Volumen</th>
                               <th>Peso</th>
                               <th>Via</th>
                               <th>Editar</th>
                               <th>Borrar</th>
                             </thead>
                             <tbody>

                              <tr>
                                <td>1</td>
                                <td>12/02/2015</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>Terrestre</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>

                              <tr>
                                <td>2</td>
                                <td>12/02/2015</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>Terrestre</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>


                              <tr>
                                <td>3</td>
                                <td>12/02/2015</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>Terrestre</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>



                              <tr>
                                <td>4</td>
                                <td>12/02/2015</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>Terrestre</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>


                              <tr>
                                <td>5</td>
                                <td>12/02/2015</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>Maritima</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>
                            </tbody>
                          </table>

                          <div class="clearfix"></div>
                          <ul class="pagination pull-right">
                            <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                          </ul>
                    </div>
                  

                  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                          <h4 class="modal-title custom_align" id="Heading">Eliminar viaje</h4>
                        </div>
                        <div class="modal-body">

                         <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar este viaje?</div>

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

                  </div>
                  <div role="tabpanel" class="tab-pane" id="profile">
                    <h4>Paquetes publicados</h4>
                          <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">

                             <thead>
                               <th>ID</th>
                               <th>Fecha publicación</th>
                               <th>Descripción</th>
                               <th>Salida</th>
                               <th>Destino</th>
                               <th>Volumen</th>
                               <th>Peso</th>
                               <th>Recompesa</th>
                             </thead>
                             <tbody>

                              <tr>
                                <td>1</td>
                                <td>12/02/2015</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>$200</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_package" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>

                              <tr>
                                <td>2</td>
                                <td>12/02/2015</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>$200</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_package" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>


                              <tr>
                                <td>3</td>
                                <td>12/02/2015</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>$200</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_package" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>



                              <tr>
                                <td>4</td>
                                <td>12/02/2015</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>$200</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_package" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>


                              <tr>
                                <td>5</td>
                                <td>12/02/2015</td>
                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td>Mérida - 14/03/15</td>
                                <td>Pakistan - 15/03/15</td>
                                <td>Pequeño</td>
                                <td>3Kg</td>
                                <td>$200</td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete_package" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                              </tr>
                            </tbody>
                          </table>

                          <div class="clearfix"></div>
                          <ul class="pagination pull-right">
                            <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                          </ul>
                    </div>
                  

                  <div class="modal fade" id="delete_package" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                          <h4 class="modal-title custom_align" id="Heading">Eliminar paquete</h4>
                        </div>
                        <div class="modal-body">

                         <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar este paquete?</div>

                       </div>
                       <div class="modal-footer ">
                        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                      </div>
                    </div>
                    <!-- /.modal-content 2 --> 
                  </div>
                  <!-- /.modal-dialog 2 --> 
                </div>
                  </div>
                   
                  <!-- /.Tabs dummys no borrar --> 
                  <div role="tabpanel" class="tab-pane" id="messages">..ff.</div>
                  <div role="tabpanel" class="tab-pane" id="settings">.gg..</div>

                </div>

              </div>
            </div>
          </div>
        </div>
        <a href="profile" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
      </div>

      <div class="col-md-3">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>Paquetes y viajes próximos</h3>
          </div>
          <div class="panel-body"> 
            <div class="table-responsive">
              <table class="table">

                <tbody>
                  <tr>
                    <td colspan="8"><strong>Viajes publicados: </strong>4 viajes</td>
                  </tr>
                 
                  <tr>
                    <td colspan="8"><strong>Paquetes publicados: </strong>10 paquetes</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Paquetes a transportar: </strong>2 paquetes</td>
                  </tr>
                  <tr>
                    <td colspan="8"><strong>Paquetes en envio: </strong>5 paquetes</td>
                  </tr>
                </tbody>
              
              </table>
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
  <script type="text/javascript" src="plugins/prism/prism.js"></script>    
  <script type="text/javascript" src="js/main.js"></script>       
</body>
</html>