<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RidePack</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/upcoming-trips.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
  
	<section>
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


<section style="background:#efefe9;">
  <div class="container">
    <div class="row">
      <div class="board">
        <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
        <div class="board-inner">
          <ul class="nav nav-tabs" id="myTab">
            <div class="liner"></div>
            <li class="active">
             <a href="#home" data-toggle="tab" title="welcome">
              <span class="round-tabs one">
                <i class="glyphicon glyphicon-plane"></i>
              </span> 
            </a></li>

            <li><a href="#profile" data-toggle="tab" title="profile">
             <span class="round-tabs two">
               <i class="glyphicon glyphicon-gift"></i>
             </span> 
           </a>
         </li>  

       </ul></div>

       <div class="tab-content">
        <div class="tab-pane fade in active" id="home">

          <h3 class="head text-center">Paquetes próximos<sup><span style="color:#f48260;">♥</span></h3>
          
          
        </div>
        <div class="tab-pane fade" id="profile">
          <h3 class="head text-center">Viajes próximos<sup></h3>
          
          
        </div>
        

      </div>
    </div>
  </div>
</section>

</body>
</html>