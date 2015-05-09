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
          <a href="{{url('/')}}">
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
              <li class="nav-item"><a href="{{ url('profile')}}">Perfil</a></li>
              <li class="nav-item"><a href="{{ url('upcoming/trips')}}">Buscar</a></li>
              <li class="nav-item active"><a href="{{ url('post/package')}}">Publicar paquete</a></li>                        
              <li class="nav-item"><a href="{{ url('post/trip')}}">Publicar viaje</a></li>
              <li class="nav-item"><a href="{{ url('logout')}}">Cerrar sesión</a></li>
              <li class="nav-item last">
                @if(Auth::user()->picture)
                  <img class="media-object img-circle" src="{{asset(Auth::user()->picture)}}" width="50px" height="50px" alt="profile">
                @else
                  <img class="media-object img-circle" src="{{asset('img/default_user.png')}}" width="50px" height="50px" alt="profile">
                @endif
              </li>
            </ul><!--//nav-->
          </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
      </div>
    </header><!--//header-->  



    <br><br><br><br>
  <div class="container">
    {{Form::open(array('url'=>url('post/package'),'files'=>true))}}
    <div class="row">
        
      <h2>Publica tus paquetes</h2>
      <hr class="colorgraph">

      <div class="form-group">
        {{Form::text('title', null, array('id'=>'title','class'=>'form-control input-lg','placeholder'=>'Título o descripción del paquete','tabindex'=>'1','required'=>'true','maxlength'=>'60'))}}
        <div>{{ $errors->first('title') }}</div>
      </div>  
      
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
              {{Form::select('size', array(''=>'Tamaño del paquete', 'Extra pequeño'=>'Extra pequeño', 'Pequeño'=>'Pequeño', 'Mediano'=>'Mediano', 'Grande'=>'Grande', 'Extra grande'=>'Extra grande'), null, array('id'=>'size','class'=>'form-control input-lg','tabindex'=>'2','required'=>'true'))}}
              <div>{{ $errors->first('size') }}</div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            {{Form::text('weight', null, array('id'=>'weight','class'=>'form-control input-lg','placeholder'=>'Peso de mi paquete en kg','tabindex'=>'3','required'=>'true','min'=>'0'))}}
            <div>{{ $errors->first('weight') }}</div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            {{Form::text('search_from_city', null, array('id'=>'search_from_city','class'=>'form-control input-lg','placeholder'=>'Buscar ciudad de salida','tabindex'=>'4'))}}
            {{Form::hidden('from_city', null, array('id'=>'from_city'))}}
            <div>{{ $errors->first('from_city') }}</div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            {{Form::text('sending_date', null, array('id'=>'sending_date', 'class'=>'form-control input-lg', 'required'=>'true', 'tabindex'=>'5', 'placeholder'=>'Fecha salida', 'onfocus'=>"(this.type='date')", 'onblur'=>"(this.type='text')"))}}
            <div>{{ $errors->first('sending_date') }}</div>
          </div>
        </div>
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

      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            {{Form::text('search_to_city', null, array('id'=>'search_to_city','class'=>'form-control input-lg','placeholder'=>'Buscar ciudad de destino','tabindex'=>'5'))}}
            {{Form::hidden('to_city', null, array('id'=>'to_city'))}}
            <div>{{ $errors->first('to_city') }}</div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            {{Form::text('arrival_date', null, array('id'=>'arrival_date', 'class'=>'form-control input-lg', 'required'=>'true', 'tabindex'=>'7', 'placeholder'=>'Fecha llegada', 'onfocus'=>"(this.type='date')", 'onblur'=>"(this.type='text')"))}}
            <div>{{ $errors->first('arrival_date') }}</div>
          </div>
        </div>
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

      <div class="form-group">
        {{Form::file('pack_picture', array('id'=>'pack_picture','class'=>'form-control input-lg','tabindex'=>'8'))}}
        <div>{{ $errors->first('pack_picture') }}</div>
      </div>

      <div class="form-group">
        {{Form::number('reward', null, array('id'=>'reward','class'=>'form-control input-lg','min'=>'0','placeholder'=>'Recompensa','tabindex'=>'9'))}}
        <div>{{ $errors->first('reward') }}</div>
      </div>

      <div class="row">
        <div class="col-md-12">
          {{Form::textarea('observation', null, array('id'=>'observation','class'=>'form-control input-lg','placeholder'=>'Observaciones y comentarios','tabindex'=>'10','rows'=>'2','maxlength'=>'100'))}}
          <div>{{ $errors->first('observation') }}</div>
        </div>
      </div>

    </div>

    <div class="container">
      <hr class="colorgraph">

      <div class="row">
        <div class="col-md-6  col-sm-offset-3">
          {{Form::submit('Publicar mi paquete', array('class'=>'btn btn-primary btn-block btn-lg','tabindex'=>'11'))}}
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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
<script type="text/javascript" src="{{ URL::asset('js/googlePlaces2.js') }}"></script>
<script type="text/javascript">

  var googlePlaceFrom, googlePlaceTo;
  window.onload= function(){
    var googlePlaceFrom = new googlePlaces();

    googlePlaceFrom.displaySearch = function() {
      var place = googlePlaceFrom.autocomplete.getPlace();

      googlePlaceFrom.displayPlaceDetails(place);
    };

    googlePlaceFrom.initAutocomplete(document.getElementById('search_from_city'));

    googlePlaceFrom.inputPlaceID = document.getElementById('from_city');

    googlePlaceFrom.outputCity = document.getElementById('city_from');
    googlePlaceFrom.outputState = document.getElementById('state_from');
    googlePlaceFrom.outputCountry = document.getElementById('country_from');

    googlePlaceFrom.showPlaceDetails = function (place, status) {
      
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            googlePlaceFrom.displayPlaceDetails(place);
        }else{
            googlePlaceFrom.displayPlaceDetails({});
        }
    };

    googlePlaceFrom.getPlaceDetails();



    googlePlaceTo = new googlePlaces();

    googlePlaceTo.displaySearch = function() {
      var place = googlePlaceTo.autocomplete.getPlace();

      googlePlaceTo.displayPlaceDetails(place);
    };


    googlePlaceTo.initAutocomplete(document.getElementById('search_to_city'));

    googlePlaceTo.inputPlaceID = document.getElementById('to_city');

    googlePlaceTo.outputCity = document.getElementById('city_to');
    googlePlaceTo.outputState = document.getElementById('state_to');
    googlePlaceTo.outputCountry = document.getElementById('country_to');

    googlePlaceTo.showPlaceDetails = function (place, status) {
      
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            googlePlaceTo.displayPlaceDetails(place);
        }else{
            googlePlaceTo.displayPlaceDetails({});
        }
    };

    googlePlaceTo.getPlaceDetails();
  };


</script>

</body>
</html>