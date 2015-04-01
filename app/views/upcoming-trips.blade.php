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
    <link id="theme-style" rel="stylesheet" href="css/upcoming-trips.css">
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
            <li class="nav-item"><a class="scrollto" href="#buscar">Buscar</a></li>
            <li class="nav-item"><a href="postPackage">Publicar paquete</a></li>                        
            <li class="nav-item last"><a href="postTrip">Publicar viaje</a></li>
            <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
          </ul><!--//nav-->
        </div><!--//navabr-collapse-->
      </nav><!--//main-nav-->
    </div>
  </header><!--//header--> 


  <section id="buscar" class="user-container">
    <div class="container">
      <div class="row">
        <form action="#" class="form-inline lead-big" role="form">
          <h1>¿Qué estás buscando hoy (usuario)?</h1><br>
          <div class="form-group">
            <label>Yo quiero</label>
            <select id="upcoming-trips">
              <option value="0" selected>enviar paquete</option>
              <option value="1">llevar paquete</option>
            </select>

          </div>
          <div class="form-group">
            <label> desde</label>
            <input id="lugar" placeholder="elige un lugar" required>
            <label> a</label>
          </div>
          <div class="form-group">
            <input type="text" id="destino" placeholder="elige destino" required>
            ,
            <select id="fecha">
              <option value="0" selected>hoy</option>
              <option value="1">mañana</option>
              <option value="1">próxima semana</option>
              <option value="1">próximo mes</option>
            </select>
          </div>
          <br>
          <button type="submit" class="btn btn-default btn-lg submit">Buscar</button>

        </form>
      </div>
    </div>
  </section>

  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="board">        
          <div class="board-inner">
            <ul class="nav nav-tabs" id="myTab">
              <div class="liner"></div>
              <li class="active">
               <a href="#home" data-toggle="tab" title="Últimos paquetes registrados">
                <span class="round-tabs one">
                  <i class="glyphicon glyphicon-check"></i>
                </span> 
              </a></li>

              <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
               <span class="round-tabs three">
                <i class="glyphicon glyphicon-plane"></i>
              </span> </a>
            </li>
        </ul></div>

      <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
              <div class="col-md-12">
                <h1>Últimos paquetes registrados</h1><br>
                <ul class="event-list">
                   <li>
                    <time datetime="2015-04-20 2000">
                      <span class="day">27</span>
                      <span class="month">Abr</span>
                    </time>
                    <img src="https://farm5.staticflickr.com/4150/5045502202_1d867c8a41_q.jpg" />
                    <div class="info">
                      <h2 class="title">Pastel Tere Cazola</h2>
                      <p class="desc">Mérida > Chihuahua</p>
                      <p class="desc">Peso: 2 kg , Tamaño: pequeño</p>
                     
                      <ul>
                        <li style="width:33%;"><span class="fa fa-user-plus"></span></li>
                        <li style="width:33%;"><span class="fa fa-envelope"></span></li>
                      </ul>
                    </div>
                  </li>


                   <li>
                    <time datetime="2014-07-20 2000">
                      <span class="day">27</span>
                      <span class="month">Marz</span>
                    </time>
                    <img alt="My 24th Birthday!" src="https://farm5.staticflickr.com/4150/5045502202_1d867c8a41_q.jpg" />
                    <div class="info">
                      <h2 class="title">Pastel Tere Cazola</h2>
                      <p class="desc">Mérida > Chihuahua</p>
                      <p class="desc">Peso: 2 kg , Tamaño: pequeño</p>
                      
                      <ul>
                        <li style="width:33%;"><span class="fa fa-user-plus"></span></li>
                        <li style="width:33%;"><span class="fa fa-envelope"></span></li>
                      </ul>
                    </div>
                  </li>
                 


                  <li>
                    <time datetime="2014-07-20 2000">
                      <span class="day">27</span>
                      <span class="month">Abr</span>
                    </time>
                    <img alt="My 24th Birthday!" src="https://farm5.staticflickr.com/4150/5045502202_1d867c8a41_q.jpg" />
                    <div class="info">
                      <h2 class="title">Pastel Tere Cazola</h2>
                      <p class="desc">Mérida > Chihuahua</p>
                      <p class="desc">Peso: 2 kg , Tamaño: pequeño</p>
                      
                      <ul>
                        <li style="width:33%;"><span class="fa fa-user-plus"></span></li>
                        <li style="width:33%;"><span class="fa fa-envelope"></span></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
         
        <div class="tab-pane fade" id="messages">
          <div class="col-md-12">
                <h1>Últimos viajeros registrados</h1><br>
                <ul class="event-list">
                   <li>
                    <time datetime="2015-04-20 2000">
                      <span class="day">27</span>
                      <span class="month">Abr</span>
                    </time>
                    <img src="https://avatars1.githubusercontent.com/u/5461654?v=3&s=460" />
                    <div class="info">
                      <h2 class="title">Mérida > Chihuahua</h2>
                      <p class="desc">Modo de viaje: Terrestre</p>
                      <p class="desc">Espacio disponible: 4 kg, Tamaño: pequeño</p>
                      <ul>
                        <li style="width:33%;"><span class="fa fa-suitcase"></span></li>
                        <li style="width:33%;"><span class="fa fa-envelope"></span></li>
                      </ul>
                    </div>
                  </li>


                   <li>
                    <time datetime="2014-07-20 2000">
                      <span class="day">27</span>
                      <span class="month">Marz</span>
                    </time>
                    <img alt="My 24th Birthday!" src="https://avatars1.githubusercontent.com/u/5461654?v=3&s=460" />
                    <div class="info">
                      <h2 class="title">Mérida > Chihuahua</h2>
                      <p class="desc">Modo de viaje: Terrestre</p>
                      <p class="desc">Espacio disponible: 4 kg, Tamaño: pequeño</p>
                      <ul>
                       <li style="width:33%;"><span class="fa fa-suitcase"></span></li>
                        <li style="width:33%;"><span class="fa fa-envelope"></span></li>
                      </ul>
                    </div>
                  </li>
                 


                  <li>
                    <time datetime="2014-07-20 2000">
                      <span class="day">27</span>
                      <span class="month">Abr</span>
                    </time>
                    <img alt="My 24th Birthday!" src="https://avatars1.githubusercontent.com/u/5461654?v=3&s=460" />
                    <div class="info">
                     <h2 class="title">Mérida > Chihuahua</h2>
                      <p class="desc">Modo de viaje: Terrestre</p>
                      <p class="desc">Espacio disponible: 4 kg, Tamaño: pequeño</p>
                      <ul>
                        <li style="width:33%;"><span class="fa fa-suitcase"></span></li>
                        <li style="width:33%;"><span class="fa fa-envelope"></span></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
        </div>
        <div class="tab-pane fade" id="settings">
          <h3 class="head text-center">Drop comments!</h3>
          <p class="narrow text-center">
            Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
          </p>

          <p class="text-center">
            <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
          </p>
        </div>
        <div class="tab-pane fade" id="doner">
          <div class="text-center">
            <i class="img-intro icon-checkmark-circle"></i>
          </div>
          <h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
          <p class="narrow text-center">
            Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
          </p>
        </div>
        <div class="clearfix"></div>
        <nav>
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
</section>

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