@include('layouts.header')

  <br><br><br><br><br>
  <div class="container">
    @if(Session::has('message'))
     <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong >{{ Session::get('message') }}</strong> 
      </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">RidePack</a></li>
          <li>Perfil de usuario</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>
              @if( $user->picture )
                <img class="img-circle" width="100px" height="100px" src="{{ asset( $user->picture ) }}">
              @else
                <img class="img-circle img-thumbnail" width="100px" height="100px" src="{{ asset('img/default_user.png') }}">
              @endif
              {{$user->name}}  {{$user->last_name}}
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
                    <td colspan="8"><strong>Miembro desde: </strong>{{$user->created_at->format('d/m/y')}}</td>
                  </tr>

                   <tr>
                    <td colspan="8">
                      <strong>Ciudad: </strong>
                      @if($user->city_id)
                      <span placeid="city-{{ $user->city_id }}"></span>,
                      <span placeid="state-{{ $user->city_id }}"></span>,
                      <span placeid="country-{{ $user->city_id }}"></span>
                      <input type="hidden" placeid="placeid" value="{{ $user->city_id }}">
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Email: </strong>{{$user->email}} </td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Paquetes publicados: </strong>{{count($user->packs)}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Viajes publicados: </strong>{{count($user->trips)}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Rating: </strong>{{$user->Rating()}}/5</td>
                  </tr>

                  <tr>
                    <td colspan="8"> <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Enviar mensaje<span class="glyphicon glyphicon-chevron-right"></span></a></td>
                  </tr>
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">
            <i class="fa fa-envelope"></i> Enviar mensaje
          </h4>
        </div>
        <div class="modal-body">
          <p>Solicita más detalles</p>
          {{ Form::open( array('action' => array('UsersProfileController@sendMessage', $user->id)) ) }}
            <div class='input-group'>
              <span class='input-group-addon'>
                <i class='fa fa-envelope'></i>
              </span>
              {{ Form::textarea('message', null, array(
                'class' => 'form-control',
                'rows' => '6',
                'required'=>'true')
              ) }}
            </div>
            <br />
            {{ Form::button("<i class='fa fa-share'></i> Enviar", array(
              'type' => 'submit',
              'class' => 'btn btn-primary',
              'name' => 'submit'
            )) }}
          {{ Form::close() }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



  <br><br><br><br><br>
  @include('layouts.footer')
  
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
</body>
</html> 
