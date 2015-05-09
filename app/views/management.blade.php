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
            <li class="nav-item"><a href="{{ url('upcoming/trips')}}">Buscar</a></li>
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
          <li><a href="{{ url('/') }}">RidePack</a></li>
          <li>Gestión de paquetes y viajes</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>
              @if( Auth::user()->picture )
                <img class="img-circle" width="100px" height="100px" src="{{ asset( Auth::user()->picture ) }}">
              @else
                <img class="img-circle img-thumbnail" width="100px" height="100px" src="{{ asset('img/default_user.png') }}">
              @endif
              {{Auth::user()->name}} {{Auth::user()->last_name}}
            </h3>
          </div>

          <div class="panel-body"> 
            <div class="table-responsive">
              <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#trips" aria-controls="trips" role="tab" data-toggle="tab">Mis viajes</a></li>
                  <li role="presentation"><a href="#packs" aria-controls="packs" role="tab" data-toggle="tab">Mis paquetes</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="trips"> 
                    <h4>Viajes publicados</h4>
                    @if(count($trips) > 0)
                    <div class="table-responsive">
                      <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                          <th>Fecha publicación</th>
                          <th>Salida</th>
                          <th>Destino</th>
                          <th>Tamaño</th>
                          <th>Peso</th>
                          <th>Via</th>
                          <th>Recompensa</th>
                        </thead>
                        <tbody>
                          @foreach($trips as $trip)
                          <tr>
                            <td align="center">{{$trip -> created_at -> format("d/m/y")}}</td>
                            <td>
                              <input type="hidden" placeid="placeid" value="{{$trip -> departure_city}}">
                              <span placeid="city-{{$trip -> departure_city}}"></span> - {{$trip -> departure_date -> format("d/m/y")}}
                            </td>
                            <td>
                              <input type="hidden" placeid="placeid" value="{{$trip -> arrival_city}}">
                              <span placeid="city-{{$trip -> arrival_city}}"></span> - {{$trip -> arrival_date -> format("d/m/y")}}
                            </td>
                            <td align="center">{{$trip -> max_size}}</td>
                            <td align="center">{{$trip -> max_weight}}kg</td>
                            <td align="center">{{$trip -> transport}}</td>
                            <td align="center">${{$trip -> carry_reward}}</td>
                            <td>
                              <p data-placement="top" data-toggle="tooltip" title="Edit">
                                <a href="{{ url('edit/trip/'.$trip->id) }}"><button type='button' class='btn btn-primary btn-xs'>
                                  <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                              </p>
                            </td>
                            <td>
                              <p data-placement="top" data-toggle="tooltip" title="Delete">
                                <button type='button' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-tripid="{{$trip->id}}" data-target='#delete_trip' >
                                  <span class="glyphicon glyphicon-trash"></span>
                                </button>
                              </p>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="clearfix"></div>
                      {{$trips->links()}}
                    </div>
                    @else
                      No hay viajes publicados
                    @endif

                    <div class="modal fade" id="delete_trip" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Eliminar viaje</h4>
                          </div>
                          <div class="modal-body">
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar este viaje?</div>
                          </div>
                          <div class="modal-footer ">
                            {{Form::open(array('url'=>'delete/trip'))}}
                            {{ Form::hidden('tripid', '', array('id' => 'tripid')) }}
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            {{Form::close()}}
                          </div>
                        </div>
                        <!-- /.modal-content --> 
                      </div>
                      <!-- /.modal-dialog --> 
                    </div>
                  </div><!-- /.tab-trips --> 

                  <div role="tabpanel" class="tab-pane" id="packs">
                    
                    <h4>Paquetes publicados</h4>
                      @if (count($packs) > 0)
                      <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">

                          <thead>
                            <th>Fecha publicación</th>
                            <th>Descripción</th>
                            <th>Salida</th>
                            <th>Destino</th>
                            <th>Tamaño</th>
                            <th>Peso</th>
                            <th>Recompesa</th>
                          </thead>
                          <tbody>
                            @foreach ($packs as $pack) 
                            <tr>
                              <td>{{$pack -> created_at -> format("d/m/y")}}</td>
                              <td>{{{$pack -> title}}}</td>
                              <td> 
                                <input type="hidden" placeid="placeid" value="{{$pack->from_city}}">
                                <span placeid="city-{{$pack->from_city}}"></span> - {{$pack -> sending_date -> format("d/m/y")}}
                              </td>
                              <td>
                                <input type="hidden" placeid="placeid" value="{{$pack->to_city}}">
                                <span placeid="city-{{$pack->to_city}}"></span> - {{$pack -> arrival_date -> format("d/m/y")}}
                              </td>
                              <td>{{$pack -> size}}</td>
                              <td>{{$pack -> weight}}Kg</td>
                              <td>${{$pack -> reward}}</td>
                              <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="{{url('edit/package/'.$pack->id)}}"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                              <td>
                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                  <button type='button' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-packid="{{$pack->id}}" data-target='#delete_package' >
                                  <span class="glyphicon glyphicon-trash"></span>
                                  </button>
                                </p>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      <div class="clearfix"></div>
                      {{$packs -> links()}}
                    </div>
                    @else
                      No hay paquetes publicados
                    @endif

                    <div class="modal fade" id="delete_package" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Eliminar paquete</h4>
                          </div>
                          <div class="modal-body">
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar este paquete?</div>
                          </div>
                          <div class="modal-footer ">
                            {{Form::open(array('url'=>'/delete/pack'))}}
                            {{ Form::hidden('packid', '', array('id' => 'packid')) }}
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            {{Form::close()}}
                          </div>
                        </div>
                        <!-- /.modal-content 2 --> 
                      </div>
                      <!-- /.modal-dialog 2 --> 
                    </div>
                  </div>
                </div><!--//tab-content-->
              </div><!--//tab-panel-->
            </div><!--//table-responsive-->
          </div><!--//panel-body-->
        </div><!--//panel-info-->

        <a href="{{ url('profile') }}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
      </div><!--//col-md-9-->

      <div class="col-md-3">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>Paquetes y viajes próximos</h3>
          </div>
          <div class="panel-body"> 
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td colspan="8"><strong>Viajes publicados: </strong>{{ count(Auth::user()->trips) }}</td>
                  </tr>
                 
                  <tr>
                    <td colspan="8"><strong>Paquetes publicados: </strong>{{ count(Auth::user()->packs) }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!--//col-md-3-->

    </div><!--//row-->
  </div><!--//container-->
  
  <br><br><br>

  <!-- ******FOOTER****** --> 
  <footer class="footer">
    <div class="container text-center">
      <small class="copyright">Desarrollado con <i class="fa fa-heart"></i></small>
    </div><!--//container-->
  </footer><!--//footer-->

  <!-- Javascript -->          
  <script type="text/javascript" src="plugins/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="plugins/jquery-migrate-1.2.1.min.js"></script>    
  <script type="text/javascript" src="plugins/jquery.easing.1.3.js"></script>   
  <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>     
  <script type="text/javascript" src="plugins/prism/prism.js"></script>    
  <script type="text/javascript" src="js/main.js"></script>   
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
  <script type="text/javascript" src="js/googlePlaces2.js"></script>

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
  <!-- Dialog show event handler -->
  <script type="text/javascript">
  $('#delete_trip').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('tripid') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-footer input').val(recipient)
  })
  </script>

  <script type="text/javascript">
  $('#delete_package').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('packid') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-footer input').val(recipient)
  })
  </script>
</body>
</html>