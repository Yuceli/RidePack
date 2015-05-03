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
            <li class="nav-item"><a href="{{ URL::asset('profile')}}">Perfil</a></li>
            <li class="nav-item active"><a href="{{ URL::asset('upcoming/trips')}}">Buscar</a></li>
            <li class="nav-item"><a href="{{ URL::asset('post/package')}}">Publicar paquete</a></li>                        
            <li class="nav-item"><a href="{{ URL::asset('post/travel')}}">Publicar viaje</a></li>
            <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
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

  <script type="text/javascript">
    
    var aPlacess = [];
    var aInputPlaceIDs = $('input[placeid="placeid"]');

    var getAddressElement = function(type, aAddress){
      var sAddressElement = '';

      if(!aAddress) return sAddressElement;

      for(var i=0; i<aAddress.length; i++){
          var typesLength = aAddress[i].types.length;
          for(var j=0; j<typesLength; j++){
              if(aAddress[i] && aAddress[i].types[j] == type){
                  sAddressElement = aAddress[i].long_name;
              }
          }
      }

      return sAddressElement;
    };

    for(var i=0; i<aInputPlaceIDs.length; i++){

      var placeID = aInputPlaceIDs[i].value;

      if(aPlacess && placeID && aPlacess.indexOf(placeID) >= 0)
        continue;

      aPlacess.push(placeID);

      console.log(placeID);

      var request = {
          placeId: placeID
      };

      var oDvMap = document.createElement('div');
      var service = new google.maps.places.PlacesService(oDvMap);
      service.getDetails(request, function(place, status){

        if (status == google.maps.places.PlacesServiceStatus.OK) {

          var oCitySpans = $('span[placeid="city-'+place.place_id+'"]');
          var oStateSpans = $('span[placeid="state-'+place.place_id+'"]');
          var oCountrySpans = $('span[placeid="country-'+place.place_id+'"]');

          for(var j=0; j<oCitySpans.length; j++){

            oCitySpans[j].innerHTML = getAddressElement('locality',place.address_components);
            oStateSpans[j].innerHTML = getAddressElement('administrative_area_level_1',place.address_components)
            oCountrySpans[j].innerHTML = getAddressElement('country',place.address_components)
          }
        }
      });
    }

  </script>
  @yield('scripts')

</body>
</html>