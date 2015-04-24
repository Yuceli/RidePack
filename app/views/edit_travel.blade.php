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
  <link rel="shortcut icon" href="{{ URL::asset('img/favicon.ico') }}">  
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
  <!-- Global CSS -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- Plugins CSS -->    
  <link rel="stylesheet" href="{{ URL::asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/prism/prism.css') }}">
  <!-- Theme CSS -->  
  <link id="theme-style" rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
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
          <a href="{{URL::to('/')}}">
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
              <li class="active nav-item sr-only"><a class="scrollto" href="{{URL::to('/')}}">Home</a></li>
              <li class="nav-item"><a href="{{URL::to('profile')}}">Perfil</a></li>
              <li class="nav-item"><a href="{{URL::to('search')}}">Buscar</a></li>
              <li class="nav-item active"><a href="{{URL::to('post/package')}}">Publicar paquete</a></li>                        
              <li class="nav-item"><a href="{{URL::to('post/travel')}}">Publicar viaje</a></li>
              <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
            </ul><!--//nav-->
          </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
      </div>
    </header><!--//header--> 

    <br><br><br><br>
    <div class="container">
      {{Form::model($trip, array('TripController.updateTrip', $trip->id))}}
      <div class="row">
        <div class="col-md-12">
          <h2>Editar viaje</h2>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                {{Form::select('travel', array(null => 'Estoy viajando...', '1'=>'Via terrestre', '2'=>'Via áerea', '3'=>'Vía marítima'), null, array('class' => 'form-control input-lg', 'id' => 'travel', 'name' => 'travel', 'required' => 'required', 'tabindex'=>'1'))}}
                <div>{{ $errors -> first('travel')}}</div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                {{Form::select('package', array('' => 'Puedo transportar un paquete...', '1'=>'Extra pequeño', '2'=>'Pequeño', '3'=>'Mediano', '4'=>'Grande', '5'=>'Extra grande'), null, array('class' => 'form-control input-lg', 'id' => 'package', 'name' => 'package', 'required'=>'required', 'tabindex'=>'2'))}}
                <div>{{ $errors -> first('package')}}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::number('quantity', null, array('id'=>'quantity', 'name'=>'quantity', 'min' => '1', 'max' => '15', 'class'=>'form-control input-lg','tabindex'=>'3', 'placeholder' => 'Peso en Kg', 'required'=>'true'))}}
              <div>{{ $errors->first('quantity') }}</div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::number('volume', null, array('id'=>'volume', 'name'=>'volume', 'min' => '1', 'max' => '15', 'class'=>'form-control input-lg','placeholder'=>'Volumen del paquete','tabindex'=>'4',  'required'=>'true'))}}
              <div>{{ $errors->first('volume') }}</div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::number('reward ', null, array('id'=>'reward', 'name'=>'reward', 'min' => '0', 'class'=>'form-control input-lg','placeholder'=>'Recompensa por paquete','tabindex'=>'5',  'required'=>'true'))}}
              <div>{{ $errors->first('reward') }}</div>
            </div>
          </div>
        </div>


        <div class="form-group">
          {{Form::text('search_from_city', null, array('id'=>'search_from_city','class'=>'form-control input-lg', 'name'=>'ciudad_salida', 'placeholder'=>'Ciudad de salida','tabindex'=>'6', 'required'=>'required'))}}
          {{Form::hidden('from_city', null, array('id'=>'from_city'))}}
          <div>{{ $errors->first('from_city') }}</div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('city_from', null, array('id'=>'city_from','class'=>'form-control input-lg','placeholder'=>'Ciudad de salida','readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('state_from', null, array('id'=>'state_from','class'=>'form-control input-lg','placeholder'=>'Estado de salida','readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('country_from', null, array('id'=>'country_from','class'=>'form-control input-lg','placeholder'=>'País de salida','readonly'=>true))}}
            </div>
          </div>
        </div>

        <div class="form-group">
            {{Form::text('search_to_city', null, array('id'=>'search_to_city', 'name'=>'ciudad_destino' ,'class'=>'form-control input-lg','placeholder'=>'Ciudad de destino','tabindex'=>'7', 'required'=>'required'))}}
            {{Form::hidden('to_city', null, array('id'=>'to_city'))}}
            <div>{{ $errors->first('to_city') }}</div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('city_to', null, array('id'=>'city_to','class'=>'form-control input-lg','placeholder'=>'Ciudad de destino','readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('state_to', null, array('id'=>'state_to','class'=>'form-control input-lg','placeholder'=>'Estado de destino','readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('country_to', null, array('id'=>'country_to','class'=>'form-control input-lg','placeholder'=>'País de destino','readonly'=>true))}}
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="departure_date" id="date" class="form-control input-lg" placeholder="Fecha de salida" required="required" tabindex="8" onfocus="(this.type='date')" onblur="(this.type='text')" >
               <div>{{ $errors->first('departure_date') }}</div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="arrival_date" id="date" class="form-control input-lg" placeholder="Fecha de llegada" required="required" tabindex="9" onfocus="(this.type='date')" onblur="(this.type='text')">
              <div>{{ $errors->first('arrival_date') }}</div>
           </div>
         </div>
       </div>
       <div class="row">
        <div class="col-md-12">
            {{Form::textarea('observation', null, array('id'=>'observation','class'=>'form-control input-lg','placeholder'=>'Observaciones y comentarios','tabindex'=>'10','rows'=>'3','maxlength'=>'100'))}}
            <div>{{ $errors->first('observation') }}</div>
        </div>
      </div>
    </div>
    
    <div class="container">
      <hr class="colorgraph">
      <div class="row">
        <div class="col-md-6  col-sm-offset-3">
          {{Form::submit('Editar viaje', array('class'=>'btn btn-primary btn-block btn-lg','tabindex'=>'11', 'value'=>'Editar viaje'))}}
        </div>
      </div>
    </div>
  </div>
  {{Form::close()}}  
</div>


<br><br>
<!-- ******FOOTER****** --> 
<footer class="footer">
  <div class="container text-center">
    <small class="copyright">Desarrollado con <i class="fa fa-heart"></i> por desarrolladores de RidePack</small>
  </div><!--//container-->
</footer><!--//footer-->

<!-- Javascript -->          
<script type="text/javascript" src="{{ URL::asset('plugins/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/jquery-migrate-1.2.1.min.js') }}"></script>    
<script type="text/javascript" src="{{ URL::asset('plugins/jquery.easing.1.3.js') }}"></script>   
<script type="text/javascript" src="{{ URL::asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>     
<script type="text/javascript" src="{{ URL::asset('plugins/jquery-scrollTo/jquery.scrollTo.min.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('plugins/prism/prism.js') }}"></script>    
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>  
 

<!--API de google-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
<script type="text/javascript" src="{{ URL::asset('js/googlePlaces2.js') }}"></script>


<script type="text/javascript">

  var gp1, gp2;
  window.onload= function(){
    var gp1 = new googlePlaces();

    gp1.displaySearch = function() {
      var place = gp1.autocomplete.getPlace();

      gp1.displayPlaceDetails(place);
    };

    gp1.initAutocomplete(document.getElementById('search_from_city'));

    gp1.inputPlaceID = document.getElementById('from_city');

    gp1.outputCity = document.getElementById('city_from');
    gp1.outputState = document.getElementById('state_from');
    gp1.outputCountry = document.getElementById('country_from');

    gp1.showPlaceDetails = function (place, status) {
      
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            gp1.displayPlaceDetails(place);
        }else{
            gp1.displayPlaceDetails({});
        }
    };

    gp1.getPlaceDetails();



    gp2 = new googlePlaces();

    gp2.displaySearch = function() {
      var place = gp2.autocomplete.getPlace();

      gp2.displayPlaceDetails(place);
    };


    gp2.initAutocomplete(document.getElementById('search_to_city'));

    gp2.inputPlaceID = document.getElementById('to_city');

    gp2.outputCity = document.getElementById('city_to');
    gp2.outputState = document.getElementById('state_to');
    gp2.outputCountry = document.getElementById('country_to');

    gp2.showPlaceDetails = function (place, status) {
      
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            gp2.displayPlaceDetails(place);
        }else{
            gp2.displayPlaceDetails({});
        }
    };

    gp2.getPlaceDetails();
  };


</script>

</body>
</html>