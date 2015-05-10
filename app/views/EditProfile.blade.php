<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <title>RidePack</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::asset('plugins/font-awesome/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('plugins/prism/prism.css') }}">
  <!-- Theme CSS -->  
  <link id="theme-style" rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
            <li class="nav-item active"><a href="{{ url('profile')}}">Perfil</a></li>
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


  <br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Editar perfil </h2>
        <hr class="colorgraph">

        {{Form::model(Auth::user(),array('id'=>'editForm','files'=>true))}}
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
             {{Form::text('name', null, array('id'=>'name','class'=>'form-control input-lg','placeholder'=>'Nombre','tabindex'=>'1','required'=>'true'))}}
             @if($errors->first('name'))<div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>@endif
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::text('last_name', null, array('id'=>'last_name','class'=>'form-control input-lg','placeholder'=>'Apellido','tabindex'=>'2','required'=>'true'))}}
              @if($errors->first('last_name'))<div class="alert alert-danger" role="alert">{{ $errors->first('last_name') }}</div>@endif
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::text('birthdate', Auth::user()->birthdate? Auth::user()->birthdate->toDateString() : null, array('id'=>'birthdate', 'class'=>'form-control input-lg', 'tabindex'=>'3', 'placeholder'=>'Fecha de nacimiento', 'onfocus'=>"(this.type='date')", 'onblur'=>"(this.type='text')"))}}
              @if($errors->first('birthdate'))<div class="alert alert-danger" role="alert">{{ $errors->first('birthdate') }}</div>@endif
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::text('phone', null, array('id'=>'phone','class'=>'form-control input-lg','placeholder'=>'Teléfono','tabindex'=>'4'))}}
              @if($errors->first('phone'))<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>@endif
            </div>
          </div>
        </div>

        <div class="form-group">
          {{Form::text('search_city', null, array('id'=>'search_city','class'=>'form-control input-lg','placeholder'=>'Buscar ciudad','tabindex'=>'5'))}}
          {{Form::hidden('city_id', null, array('id'=>'city_id'))}}
          @if($errors->first('city_id'))<div class="alert alert-danger" role="alert">{{ $errors->first('city_id') }}</div>@endif
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('city', null, array('id'=>'city','class'=>'form-control input-lg', 'readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('state', null, array('id'=>'state','class'=>'form-control input-lg', 'readonly'=>true))}}
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">
              {{Form::text('country', null, array('id'=>'country','class'=>'form-control input-lg', 'readonly'=>true))}}
            </div>
          </div>
        </div>

         <div class="form-group">
          {{Form::email('email', null, array('id'=>'email','class'=>'form-control input-lg', 'placeholder'=>'E-mail','tabindex'=>'6','required'=>'true'))}} 
          @if($errors->first('email'))<div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>@endif
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::password('password', array('id'=>'password','class'=>'form-control input-lg','placeholder'=>'Nueva Contraseña','tabindex'=>'7'))}}
              @if($errors->first('password'))<div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>@endif
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
              {{Form::password('password_confirmation', array('id'=>'password_confirmation','class'=>'form-control input-lg','placeholder'=>'Confirmar contraseña','tabindex'=>'8'))}}
              @if($errors->first('password_confirmation'))<div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation ') }}</div>@endif
            </div>
          </div>
        </div>

        
        @if (Auth::user()->picture)
          <div class="form-group">
            <div class="col-sm-4">
              <img class="img-rounded" width="140px" height="140px" src="{{ asset(Auth::user()->picture) }}" />
            </div>
          </div>
        @endif

        <div class="form-group">
          {{Form::file('picture', array('id'=>'picture','class'=>'form-control input-lg'))}}
          @if($errors->first('picture'))<div class="alert alert-danger" role="alert">{{ $errors->first('picture') }}</div>@endif
        </div>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-2">
            {{Form::submit('Guardar', array('class'=>'btn btn-primary btn-block btn-lg','tabindex'=>'9'))}}
          </div>
        </div>

        {{Form::close()}}
      </div>
    </div>
  </div>



  


  




  <br><br><br>
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

      var googlePlace = null;
      window.onload= function(){
        googlePlace = new googlePlaces();

        googlePlace.displaySearch = function() {
            var place = googlePlace.autocomplete.getPlace();

            googlePlace.displayPlaceDetails(place);
        }

        googlePlace.initAutocomplete(document.getElementById('search_city'));

        googlePlace.inputPlaceID = document.getElementById('city_id');

        googlePlace.outputCity = document.getElementById('city');
        googlePlace.outputState = document.getElementById('state');
        googlePlace.outputCountry = document.getElementById('country');

        googlePlace.showPlaceDetails = function (place, status) {

            if (status == google.maps.places.PlacesServiceStatus.OK) {
                googlePlace.displayPlaceDetails(place);
            }else{
                googlePlace.displayPlaceDetails({});
            }
        };

        

        googlePlace.getPlaceDetails();
      };


    </script>

  </body>
  </html>