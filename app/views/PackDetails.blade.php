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
          <a href="{{ url('/') }}">
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
              <li class="nav-item"><a href="{{ url('upcoming/packages')}}">Buscar</a></li>
              <li class="nav-item"><a href="{{ url('post/package')}}">Publicar paquete</a></li>                        
              <li class="nav-item"><a href="{{ url('post/trip')}}">Publicar viaje</a></li>
              <li class="nav-item"><a href="{{ url('logout')}}">Cerrar sesión</a></li>
              <li class="nav-item last">
                @if($authUser->picture)
                  <img class="media-object img-circle" src="{{asset($authUser->picture)}}" width="50px" height="50px" alt="profile">
                @else
                  <img class="media-object img-circle" src="{{asset('img/default_user.png')}}" width="50px" height="50px" alt="profile">
                @endif
              </li>
            </ul><!--//nav-->
          </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
      </div>
    </header><!--//header-->  

  <br><br><br><br><br>
  <div class="container">
    @if(Session::has('message'))
     <div class="alert alert-{{ Session::get('class') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('message') }}
      </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">RidePack</a></li>
          <li>Detalles del paquete</li>
        </ol>
      </div>
    </div>
    <div class="row">
      @if( $user->id == $authUser->id )
        <div class="col-md-12">
      @else
        <div class="col-md-9">
      @endif
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>
              <a href="{{ url('users/'.$user->id) }}">
                @if( $user->picture )
                  <img class="img-circle" width="100px" height="100px" src="{{ asset( $user->picture ) }}">
                @else
                  <img class="img-circle img-thumbnail" width="100px" height="100px" src="{{ asset('img/default_user.png') }}">
                @endif
                {{$user -> name}} {{$user -> last_name}}
              </a>
            </h3>
          </div>
          <div class="panel-body"> 
            <div class="table-responsive">
              <table class="table">
                
                <thead>
                  <tr>
                    <th>Paquete</th>
                    <th>Detalles</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td>
                    @if($pack->picture)
                      <img src="{{ asset($pack->picture) }}" width="160px" height="160px" class="img-cart" />
                    @else
                      <img src="{{ asset('img/default_img.png') }}" width="180px" height="180px" class="img-cart" />
                    @endif
                    </td>
                    <td>
                      <p>{{$pack -> title }}</p>
                      <strong>Volumen:</strong><p>{{$pack -> size}}</p> 
                      <strong>Peso:</strong><p>{{$pack -> weight }} kg</p>
                      <strong>Recompensa:</strong><p>${{$pack -> reward }}</p>  
                    </td>
                  </tr>
                  
                  <tr>
                    <td colspan="8">
                      <strong>De: </strong>
                      <input type="hidden" placeid="placeid" value="{{$pack->from_city}}">
                      <span placeid="city-{{$pack->from_city}}"></span>
                    </td>
                  </tr>
                  
                  <tr>
                    <td colspan="8">
                      <strong>Hacia: </strong>
                      <input type="hidden" placeid="placeid" value="{{$pack->to_city}}">
                      <span placeid="city-{{$pack->to_city}}"></span> 
                    </td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Fecha de entrega: </strong>{{$pack -> arrival_date -> format('d/m/y')}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Observaciones: </strong>{{$pack -> observation}}</td>
                  </tr>

                  @if( $packTrip )
                    <tr>
                      <td colspan="8">
                        <strong>Transportado en: </strong><br><br>
                        <a href="{{ url('trip/details/'.$packTrip->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-plane"></span></a>
                      </td>
                    </tr>
                  @endif
                  
                </tbody>

              </table>
            </div>
          </div>
        </div>
        <a href="{{ url('upcoming/packages') }}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
      </div>

      @if( $user->id != $authUser->id )
        <div class="col-md-3">
          <div class="panel panel-info panel-shadow">
            <div class="panel-heading">
              <h3>Opciones de contacto</h3>
            </div>
            <div class="panel-body"> 
              <div class="table-responsive">
                <table class="table">

                  <tbody>
                    <tr>
                      <td colspan="8"> <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ratings">Valorar usuario <span class="glyphicon glyphicon-chevron-right"></span></a></td>
                    </tr>
                    <tr>
                      <td colspan="8">
                        {{ Form::open( array('action' => array('PackDetailsController@sendRequest', $pack->id)))}}
                        {{ Form::button("Postularme a paquete <span class='glyphicon glyphicon-chevron-right'></span>", array(
                          'type' => 'submit',
                          'class' => 'btn btn-primary pull-right ',
                          'name' => 'submit',
                          'value' => 'Postularme a paquete'
                        )) }}
                        {{ Form::close() }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="8"><strong>Miembro desde: </strong>{{$user -> created_at -> format('d/m/y')}}</td>
                    </tr>
                    <tr>
                      <td colspan="8"><strong>Viajes publicados: </strong>{{count($user->trips)}}</td>
                    </tr>

                    <tr>
                      <td colspan="8"><strong>Paquetes publicados: </strong>{{count($user->packs)}}</td>
                    </tr>
                    
                    <tr>
                      <td colspan="8"><strong>Rating: </strong>{{$user -> total_rating}}/5</td>
                    </tr>
                  </tbody>
                
                </table>
              </div>
            </div>
          </div>
        </div>
      @endif

    </div>
  </div>

  <!-- Modal ratings -->
  <div class="modal fade" id="ratings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">
            <i class="fa fa-envelope"></i> Califica a este usuario
          </h4>
        </div>
        <div class="modal-body">
          {{ Form::open( array('action' => array('PackDetailsController@rateUser', $user -> id)))}}
          <p>Puedes elegir un número 1 al 5 para calificar a este usuario</p>
          <select name="rate" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select> 

        </div>
        <div class="modal-footer">
          {{ Form::button("Calificar", array(
            'type' => 'submit',
            'class' => 'btn btn-primary' . (($user -> id == Auth::user()-> id)? 'disabled' : ''),
            'name' => 'submit',
            'data-dismiss' => 'modal'
            'value' => 'Calificar'
          )) }}
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  
  <br><br><br><br><br>

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

      var request = {
          placeId: placeID
      };

      var oDvMap = document.createElement('div');
      var service = new google.maps.places.PlacesService(oDvMap);
      service.getDetails(request, function(place, status){

        if (status == google.maps.places.PlacesServiceStatus.OK) {

          var oCitySpans = $('span[placeid="city-'+place.place_id+'"]');
          //var oStateSpans = $('span[placeid="state-'+place.place_id+'"]');
          //var oCountrySpans = $('span[placeid="country-'+place.place_id+'"]');

          for(var j=0; j<oCitySpans.length; j++){

            oCitySpans[j].innerHTML = getAddressElement('locality',place.address_components);
            //oStateSpans[j].innerHTML = getAddressElement('administrative_area_level_1',place.address_components)
            //oCountrySpans[j].innerHTML = getAddressElement('country',place.address_components)
          }
        }
      });
    }

  </script>   
</body>
</html>