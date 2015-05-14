@include('layouts.headerProfile')
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

  <body class="background">
    <br><br><br>
    <div class="container-fluid">

      @if(Session::has('message'))
       <div class="alert alert-{{ Session::get('class') }} alert-dismissable">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ Session::get('message') }}
        </div>
      @endif

        <div class="row">
            <div class="col-md-6 container-profile">
                <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                            <h2>{{ Auth::user()->name; }}  {{ Auth::user()->last_name; }}</h2>
                            <p><strong>Email: </strong> {{ Auth::user()->email; }} </p>
                            <p><strong>Usuario desde: </strong> {{ Auth::user() -> created_at ->  format("d/m/y"); }}  </p>
                            <p><strong>Edad: </strong>{{ Auth::user()->birthdate?Auth::user()->birthdate->age:'' }}</p>
                            <input id="city_id" value="{{ Auth::user()->city_id; }}" type="hidden">
                            <p><strong>Pais: </strong><span id="country"> </span></p>
                            <p><strong>Estado: </strong><span id="state"> </span></p>
                            <p><strong>Ciudad: </strong><span id="city"> </span></p>
                            </div>             
                        </div>
                        <div class="col-xs-12 divider text-center">
                             <a href="edit/profile"><button class="btn btn-default btn-block"><span class="fa fa-plus-circle"></span> Editar perfil</button></a><hr>
                            <a href="management"><button class="btn btn-primary btn-block"><span class="fa fa-plus-circle"></span> Mis viajes y paquetes</button></a>
                            <div class="col-xs-12 col-sm-6 emphasis">
                                <h2><strong> {{count(Auth::user()->trips)}} </strong></h2>                    
                                <p><small>Viajes publicados</small></p>
                                <a href="post/trip"><button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Publicar viaje</button></a>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                                <h2><strong>{{count(Auth::user()->packs)}}</strong></h2>                    
                                <p><small>Paquetes publicados</small></p>
                                <a href="post/package"><button class="btn btn-info btn-block"><span class="fa fa-user"></span> Publicar paquete </button></a>
                            </div>
                        </div>

                        <div class="col-xs-12 divider text-center">
                            <h2>Opciones de la cuenta</h2>
                            <div class="col-xs-12 col-sm-6 emphasis">             
                                <p><small>Eliminar cuenta</small></p>
                                <button class="btn btn-danger btn-block" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="fa fa-plus-circle"></span> Eliminar cuenta</button>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">           
                                <p><small>Restablecer contraseña</small></p>
                                <a href="request"><button class="btn btn-warning btn-block"><span class="fa fa-user"></span> Restablecer contraseña </button></a>
                            </div>
                        </div>
                    </div>                 
                </div>                     


                <div class="col-md-6">
                    <div class="page-header">
                        <h3 class="reviews">Opciones de perfil</h3>
                    </div>
                    <div class="comment-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solcitudes paquetes</h4></a></li>
                            <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Solicitudes viajes</h4></a></li>
                        </ul>            
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments-logout">                
                              <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                   <thead>
                                     <th>ID</th>
                                     <th>Descripción</th>
                                     <th>Fecha</th>
                                 </thead>
                                 <tbody>
                                    @foreach(Auth::user()->packs as $pack)
                                        @foreach($pack -> requests as $petition)
                                            @if($petition->status=='onhold')
                                            <?php 
                                                $created = explode(" ", $petition -> created_at);
                                                $created = $created[0];
                                                $created = explode("-", $created);
                                                $created = $created[2]."/".$created[1]."/".substr($created[0], 2);
                                                $id_user = $petition -> from_user;
                                                $user = User::find($id_user);
                                            ?>
                                            <tr>
                                                <td>{{$petition -> id}}</td>
                                                <td>{{$user -> name}} se ha postulado para transportar tu paquete</td>
                                                <td>{{$created}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                            </tbody>
                          </table>
                                <a class="btn btn-info btn-circle text-uppercase pull-right" href="handle/request" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Gestionar solicitudes</a>
                            </div>
                            </div>


                            <div class="tab-pane" id="add-comment">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                   <thead>
                                     <th>ID</th>
                                     <th>Descripción</th>
                                     <th>Fecha</th>
                                 </thead>
                                 <tbody>
                                    @foreach(Auth::user()->trips as $trip)
                                        @foreach($trip -> requests as $petition)
                                            @if($petition->status=='onhold')
                                            <?php 
                                                $created = explode(" ", $petition -> created_at);
                                                $created = $created[0];
                                                $created = explode("-", $created);
                                                $created = $created[2]."/".$created[1]."/".substr($created[0], 2);
                                                $id_user = $petition -> from_user;
                                                $user = User::find($id_user);
                                            ?>
                                            <tr>
                                                <td>{{$petition -> id}}</td>
                                                <td>{{$user -> name}} ha solicitado tus servicios como viajero</td>
                                                <td>{{$created}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                            </tbody>
                          </table>
                                <a class="btn btn-info btn-circle text-uppercase pull-right" href="handle/request" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Gestionar solicitudes</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            

    <!--Nodal para eliminar cuenta del sistema-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                          <h4 class="modal-title custom_align" id="Heading">Eliminar cuenta</h4>
                        </div>
                        <div class="modal-body">

                         <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar su cuenta?</div>

                       </div>
                       <div class="modal-footer ">
                        <form method="POST" action="{{ url('delete/user') }}">
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content --> 
                  </div>
                  <!-- /.modal-dialog --> 
                </div>

    <br><br><br>

    @include('layouts.footer')
    <script type="text/javascript" src="js/googlePlaces.js"></script> 
    <script type="text/javascript">

      window.onload= function(){
        // Input hidden con el city_id
        googlePlaces.inputPlaceID = document.getElementById('city_id');

        // Divs o inputs para mostrar la ciudad, estado y país.
        googlePlaces.outputCity = document.getElementById('city');
        googlePlaces.outputState = document.getElementById('state');
        googlePlaces.outputCountry = document.getElementById('country');

        // Muestra los detalles correspondientes al city_id en el outputCity, outputState y outputCountry.
        googlePlaces.getPlaceDetails();
      };
    </script>

</body>
</html> 