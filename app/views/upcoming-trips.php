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
  <link rel="stylesheet" href="css/upcoming-trips.css">
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

  
  <section class="user-container">
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
          <label>desde</label>
          <input id="lugar" placeholder="elige un lugar" required>
          <label>a</label>
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
            <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
            <div class="board-inner">
              <ul class="nav nav-tabs" id="myTab">
                <div class="liner"></div>
                <li class="active">
                 <a href="#home" data-toggle="tab" title="welcome">
                  <span class="round-tabs one">
                    <i class="glyphicon glyphicon-home"></i>
                  </span> 
                </a></li>

                <li><a href="#profile" data-toggle="tab" title="profile">
                 <span class="round-tabs two">
                   <i class="glyphicon glyphicon-user"></i>
                 </span> 
               </a>
             </li>
             <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
               <span class="round-tabs three">
                <i class="glyphicon glyphicon-gift"></i>
              </span> </a>
            </li>

            <li><a href="#settings" data-toggle="tab" title="blah blah"><span class="round-tabs four">
              <i class="glyphicon glyphicon-comment"></i>
            </span> 
          </a></li>

          <li><a href="#doner" data-toggle="tab" title="completed">
           <span class="round-tabs five">
            <i class="glyphicon glyphicon-ok"></i>
          </span> </a>
        </li>

      </ul></div>

      <div class="tab-content">
        <div class="tab-pane fade in active" id="home">

          <h3 class="head text-center">Nuevos paquetes registrados</h3>
          <p class="narrow text-center">
            Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
          </p>

          <p class="text-center">
            <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
          </p>
        </div>
        <div class="tab-pane fade" id="profile">
          <h3 class="head text-center">Nuevos viajes registrados</h3>
          <p class="narrow text-center">
            Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
          </p>

          <p class="text-center">
            <a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
          </p>

        </div>
        <div class="tab-pane fade" id="messages">
          <h3 class="head text-center">Bootsnipp goodies</h3>
          <p class="narrow text-center">
            Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
          </p>

          <p class="text-center">
           <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
         </p>
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
    </div>

  </div>
  </div>
  </div>
  </section>



  
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

  </body>
  </html>