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
    <link id="theme-style" rel="stylesheet" href="{{ URL::asset('css/upcoming-trips.css')}}">
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
        <a href="{{ url('/')}}">
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
            <li class="nav-item active"><a href="{{ url('upcoming/packages')}}">Buscar</a></li>
            <li class="nav-item"><a href="{{ url('post/package')}}">Publicar paquete</a></li>                        
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


  <section id="buscar" class="user-container">
    <div class="container">
      <div class="row">
          <h1>¿Qué estás buscando hoy {{Auth::user()->name}}?</h1><br>

          {{Form::open(array('class'=>'form-inline lead-big', 'role'=>'form', 'url'=>'search'))}}
          
          <label>Yo quiero </label>

          <div class="form-group">
            {{Form::select('send_package', array('1'=>'enviar un paquete','0'=>'llevar un paquete'), '1', array('id'=>'send_package'))}}
          </div>

          <label> desde </label>

          <div class="form-group">
            {{Form::text('from_search', null, array('id'=>'from_search','placeholder'=>'elige un lugar','required'=>'true'))}}
            {{Form::hidden('from_city', null, array('id'=>'from_city'))}}
          </div>

          <label> a </label>

          <div class="form-group">
            {{Form::text('to_search', null, array('id'=>'to_search','placeholder'=>'elige un destino','required'=>'true'))}}
            {{Form::hidden('to_city', null, array('id'=>'to_city'))}}

          <label>, </label>

            {{Form::date('sending_date', null, array('id'=>'sending_date','required'=>'true'))}}
          </div>
          <br>
          {{Form::submit('Buscar',array('class'=>'btn btn-default btn-lg submit'))}}

          {{Form::close()}}
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

            @yield('tabs')
            
          </ul>
        </div>

        <div class="tab-content">

          @yield('tab-content')

        </div><!-- tab-content -->

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

    googlePlaceFrom.initAutocomplete(document.getElementById('from_search'));

    googlePlaceFrom.inputPlaceID = document.getElementById('from_city');

    googlePlaceFrom.outputCity = document.createElement('div');
    googlePlaceFrom.outputState = document.createElement('div');
    googlePlaceFrom.outputCountry = document.createElement('div');

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


    googlePlaceTo.initAutocomplete(document.getElementById('to_search'));

    googlePlaceTo.inputPlaceID = document.getElementById('to_city');

    googlePlaceTo.outputCity = document.createElement('div');
    googlePlaceTo.outputState = document.createElement('div');
    googlePlaceTo.outputCountry = document.createElement('div');

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

  <script type="text/javascript">
    
    var places = [];
    var placeIDInputs = $('input[placeid="placeid"]');

    var getAddressElement = function(addressComponentType, addressCompenents){
      var addressElement = '';

      if(!addressCompenents) return addressElement;

      for(var componentNumber = 0; componentNumber < addressCompenents.length; componentNumber++){

          var addressComponent = addressCompenents[componentNumber];
          var addressTypesLength = addressComponent.types.length;

          for(var addressTypeNumber = 0; addressTypeNumber < addressTypesLength; addressTypeNumber++){

              if(addressComponent && addressComponent.types[addressTypeNumber] == addressComponentType){
                  addressElement = addressComponent.long_name;
              }
          }
      }

      return addressElement;
    };

    for(var inputNumber = 0; inputNumber < placeIDInputs.length; inputNumber++){

      var placeID = placeIDInputs[inputNumber].value;

      if(places && placeID && places.indexOf(placeID) >= 0)
        continue;

      places.push(placeID);

      var request = {
          placeId: placeID
      };

      var mapContainer = document.createElement('div');
      var service = new google.maps.places.PlacesService(mapContainer);
      service.getDetails(request, function(place, status){

        if (status == google.maps.places.PlacesServiceStatus.OK) {

          var cityContainer = $('span[placeid="city-'+place.place_id+'"]');
          var stateContainer = $('span[placeid="state-'+place.place_id+'"]');
          var countryContainer = $('span[placeid="country-'+place.place_id+'"]');

          for(var j=0; j<cityContainer.length; j++){

            cityContainer[j].innerHTML = getAddressElement('locality',place.address_components);
            stateContainer[j].innerHTML = getAddressElement('administrative_area_level_1',place.address_components)
            countryContainer[j].innerHTML = getAddressElement('country',place.address_components)
          }
        }
      });
    }

  </script>
  @yield('scripts')

</body>
</html>