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
              <li class="nav-item"><a href="{{ URL::asset('upcoming_trips')}}">Buscar</a></li>
              <li class="nav-item"><a href="{{ URL::asset('post_package')}}">Publicar paquete</a></li>                        
              <li class="nav-item"><a href="{{ URL::asset('post_travel')}}">Publicar viaje</a></li>
              <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
            </ul><!--//nav-->
          </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
      </div>
    </header><!--//header-->  

  <br><br><br><br><br>
  <div class="container">
    @if(Session::has('message'))
      <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="#">RidePack</a></li>
          <li class="active">Detalles del paquete</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="panel panel-info panel-shadow">
          <div class="panel-heading">
            <h3>
              <img class="img-circle img-thumbnail" src="http://bootdey.com/img/Content/user_3.jpg">
              {{$user -> name}} {{$user -> last_name}}
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
                    <td><img src="{{ URL::asset($pack -> picture) }}" class="img-cart"></td>
                    <td>
                      <p>{{$pack -> title }}</p>
                      <?php 
                        $volumes = array('1' => 'Extra pequeño', '2'=>'Pequeño','3'=>'Mediano', '4'=>'Grande', '5'=>'Extra grande');       
                        $volume = $volumes[''.$pack -> volume.''];
                      ?>
                      <strong>Volumen:</strong><p>{{$volume}}</p> 
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
                    <?php 
                        $arrival_date = explode(" ", $pack -> arrival_date);
                        $arrival_date = $arrival_date[0];
                        $arrival_date = explode("-", $arrival_date);
                        $arrival_date = $arrival_date[2]."/".$arrival_date[1]."/".substr($arrival_date[0], 2);
                    ?>
                    <td colspan="8"><strong>Fecha de entrega: </strong>{{$arrival_date}}</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Observaciones: </strong>{{$pack -> observation}}</td>
                  </tr>
                </tbody>

              </table>
            </div>
          </div>
        </div>
        <a href="upcoming-packages" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Atras</a>
      </div>

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
                    <td colspan="8">
                      <a href="#" class="btn btn-primary pull-right <?php echo ($user -> id == Auth::user()-> id)? 'disabled' : '';?>" data-toggle="modal" data-target="#myModal">Enviar mensaje
                        <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="8"> <a href="#" class="btn btn-primary pull-right <?php echo ($user -> id == Auth::user()-> id)? 'disabled' : '';?>" data-toggle="modal" data-target="#ratings">Valorar usuario<span class="glyphicon glyphicon-chevron-right"></span></a></td>
                  </tr>
                  <tr>
                    <td colspan="8"> <a href="#" class="btn btn-primary pull-right <?php echo ($user -> id == Auth::user()-> id)? 'disabled' : '';?>">Postularme a paquete<span class="glyphicon glyphicon-chevron-right"></span></a></td>
                  </tr>
                  <tr>
                    <?php
                        $created = explode(" ", $user -> created_at);
                        $created = $created[0];
                        $created = explode("-", $created);
                        $created = $created[2]."/".$created[1]."/".substr($created[0], 2);
                    ?>
                    <td colspan="8"><strong>Miembro desde: </strong>{{$created}}</td>
                  </tr>
                  <tr>
                    <td colspan="8"><strong>Viajes publicados: </strong>{{count($trips)}} viajes</td>
                  </tr>

                  <tr>
                    <td colspan="8"><strong>Paquetes transportados: </strong>10 paquetes</td>
                  </tr>
                  
                  <tr>
                    <td colspan="8"><strong>Rating: </strong>{{$user -> total_rating; ?>/5</td>
                  </tr>
                </tbody>
              
              </table>
            </div>
          </div>
        </div>
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
          <p>Solicita más detalles sobre el paquete a transportar</p>
          {{ Form::open( array('action' => 'PackageDetailsController@sendMessage') ) }}
            <div class='input-group'>
              <span class='input-group-addon'>
                <i class='fa fa-envelope'></i>
              </span>
              {{ Form::textarea('message', null, array(
                'class' => 'form-control',
                'rows' => '6')
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
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
          <p>Puedes elegir un número 1 al 5 para calificar a este usuario</p>
          <select class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select> 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Calificar</button>
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

      console.log(placeID);

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