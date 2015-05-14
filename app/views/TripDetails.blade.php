@include('layouts.header')
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
          <li>Detalles del viaje</li>
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
                    <th>Detalles</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td colspan="8"><strong>Viajando de: </strong><input type="hidden" placeid="placeid" value="{{$trip->departure_city}}">
                      <span placeid="city-{{$trip->departure_city}}"></span></td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Hacia: </strong><input type="hidden" placeid="placeid" value="{{$trip->arrival_city}}">
                      <span placeid="city-{{$trip->arrival_city}}"></span></td>
                  </tr>
                  
                  <tr>
                    <td colspan="8"><strong>Fecha salida: </strong>{{$trip -> departure_date -> format("d/m/y")}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Fecha llegada: </strong>{{$trip -> arrival_date -> format("d/m/y")}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Espacio disponible: </strong>{{$trip -> max_size}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Peso máximo a transportar: </strong>{{$trip -> max_weight}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Observaciones: </strong>{{$trip -> observation}}</td>
                  </tr>

                  @if(count($tripPacks)>0)
                  <tr>
                    <td colspan="8">
                      <strong>Transportando: </strong><br><br>
                      @foreach( $tripPacks as $tripPack)
                        <a href="{{ url('package/details/'.$tripPack->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-briefcase"></span></a>
                      @endforeach
                    </td>
                  </tr>
                  @endif
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
        <a href="{{url('upcoming/trips')}}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
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
                      @if($canRate)
                      <td colspan="8"> <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#ratings">Valorar usuario <span class="glyphicon glyphicon-chevron-right"></span></a></td>
                      @endif
                    </tr>
                    <tr>
                      <td colspan="8">
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#request">
                          Solicitar viaje
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
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
        {{ Form::open( array('action' => array('TripDetailsController@rateUser', $trip->id)))}}
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
          <p>Puedes elegir un número 1 al 5 para calificar a este usuario</p>
          <select class="form-control" name="rate">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-primary" value="Calificar">
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>

  <!-- Modal pack request -->
  <div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="requestLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        {{ Form::open( array('action' => array('TripDetailsController@sendRequest', $trip->id)))}}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="requestLabel">
              Solicitar viaje
            </h4>
          </div>
          <div class="modal-body">
            @if(count($matchPacks) > 0)
              <p>Elige o crea el paquete que deseas enviar en este viaje.</p>

              <select class="form-control" id="requestPackID" name="requestPackID" required>
                <option value="">Selecciona un paquete..</option>

                @foreach($matchPacks as $matchPack)
                  <option value="{{ $matchPack->id }}">{{ $matchPack->title }}</option>
                @endforeach

              </select>
            @else
              <p>No has publicado un paquete que coincida con las características del viaje.</p>
            @endif
          </div>
          <div class="modal-footer">
            <a href="{{ url('post/package/match/'.$trip->id) }}" class="btn btn-primary">Publicar paquete</a>
            @if(count($matchPacks) > 0)
              {{ Form::submit('Solicitar viaje', array(
                'class' => 'btn btn-primary pull-right',
                'value' => 'Solicitar viaje'
              )) }}
            @endif
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>


  <br>
  @include('layouts.footer')   
  <script type="text/javascript" src="{{ URL::asset('js/googlePlaces2.js') }}"></script>
  <script type="text/javascript">
    
    var places = [];
    var inputPlaceIDs = $('input[placeid="placeid"]');

    var getAddressElement = function(type, address){
      var addressElement = '';

      if(!address) return addressElement;

      for(var i=0; i<address.length; i++){
          var typesLength = address[i].types.length;
          for(var j=0; j<typesLength; j++){
              if(address[i] && address[i].types[j] == type){
                  addressElement = address[i].long_name;
              }
          }
      }

      return addressElement;
    };

    for(var i=0; i<inputPlaceIDs.length; i++){

      var placeID = inputPlaceIDs[i].value;

      if(places && placeID && places.indexOf(placeID) >= 0)
        continue;

      places.push(placeID);

      console.log(placeID);

      var request = {
          placeId: placeID
      };

      var divMap = document.createElement('div');
      var service = new google.maps.places.PlacesService(divMap);
      service.getDetails(request, function(place, status){

        if (status == google.maps.places.PlacesServiceStatus.OK) {

          var citySpans = $('span[placeid="city-'+place.place_id+'"]');
          //var oStateSpans = $('span[placeid="state-'+place.place_id+'"]');
          //var oCountrySpans = $('span[placeid="country-'+place.place_id+'"]');

          for(var j=0; j<citySpans.length; j++){

            citySpans[j].innerHTML = getAddressElement('locality',place.address_components);
            //oStateSpans[j].innerHTML = getAddressElement('administrative_area_level_1',place.address_components)
            //oCountrySpans[j].innerHTML = getAddressElement('country',place.address_components)
          }
        }
      });
    }

  </script> 
</body>
</html> 
