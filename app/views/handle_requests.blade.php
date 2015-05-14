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
            <li class="nav-item active"><a href="{{ url('profile')}}">Perfil</a></li>
            <li class="nav-item"><a href="{{ url('upcoming/packages')}}">Buscar</a></li>
            <li class="nav-item"><a href="{{ url('post/package')}}">Publicar paquete</a></li>                        
            <li class="nav-item"><a href="{{ url('post/trip')}}">Publicar viaje</a></li>
            <li class="nav-item"><a href="{{ url('logout')}}">Cerrar sesión</a></li>
            <li class="nav-item last">
              @if($user->picture)
                <img class="media-object img-circle" src="{{asset($user->picture)}}" width="50px" height="50px" alt="profile">
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
  <div class="container-fluid">
    @if(Session::has('message'))
     <div class="alert alert-{{ Session::get('class') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('message') }}
      </div>
    @endif
    <div class="row">
      <div class="col-md-12 container-profile">
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">RidePack</a></li>
          <li>Solicitudes</li>
        </ol>
      </div>
    </div>



    <div class="panel panel-info panel-shadow">
      <div class="panel-heading">
        <h3>Solicitudes</h3>
      </div>
      <div class="panel-body"> 
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12" id="logout">
              <div class="request-tabs">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#pack-requests" role="tab" data-toggle="tab"><h4 class="text-center reviews text-capitalize">A paquetes</h4></a></li>
                  <li><a href="#trip-requests" role="tab" data-toggle="tab"><h4 class="text-center reviews text-capitalize">A viajes</h4></a></li>
                  <li><a href="#sent-requests" role="tab" data-toggle="tab"><h4 class="text-center reviews text-capitalize">Enviadas</h4></a></li>
                </ul>            
                <div class="tab-content">
                  <div class="tab-pane active" id="pack-requests">                
                    <div class="table-responsive">
                      <table id="mytable" class="table table-bordred table-striped">

                        <thead>
                          <th>Fecha</th>
                          <th>Descripción</th>
                          <th>Ver viaje</th>
                          <th>Ver paquete</th>
                          <th>Aceptar</th>
                          <th>Rechazar</th>
                        </thead>
                        <tbody>
                            @foreach($user->packs as $pack)
                              @foreach($pack->requests as $request)
                                @if($request->status=='onhold')
                                  <tr>
                                    <td>{{$request -> created_at -> format('d/m/y')}}</td>
                                    <td>{{$request->fromUser->name}} se ha postulado para transportar tu paquete</td>
                                    <td>
                                      <a href="{{ url('trip/details/' . $request->trip->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-plane"></span></a>
                                    </td>
                                    <td>
                                      <a href="{{ url('package/details/' . $request->requestable->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-briefcase"></span></a>
                                    </td>
                                    <td>
                                      {{ Form::open( array('action' => array('HandleRequestsController@acceptRequest', $request->id)))}}
                                      {{ Form::button("<span class='fa fa-check'></span>", array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary btn-xs ',
                                        'name' => 'submit',
                                      )) }}
                                      {{ Form::close() }}
                                    </td>
                                    <td>
                                      {{ Form::open( array('action' => array('HandleRequestsController@refuseRequest', $request->id)))}}
                                      {{ Form::button("<span class='fa fa-times'></span>", array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs ',
                                        'name' => 'submit',
                                      )) }}
                                      {{ Form::close() }}
                                    </td>
                                  </tr>
                                @endif
                              @endforeach
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="trip-requests">      
                      <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">

                          <thead>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Ver paquete</th>
                            <th>Ver viaje</th>
                            <th>Aceptar</th>
                            <th>Rechazar</th>
                          </thead>
                          <tbody>
                          @foreach($user->trips as $trip)
                              @foreach($trip -> requests as $request)
                                  @if($request->status=='onhold')
                                  <tr>
                                      <td>{{ $request->created_at->format('d/m/y') }}</td>
                                      <td>{{ $request->fromUser->name }} ha solicitado tu viaje</td>
                                      <td>
                                        <a href="{{ url('package/details/' . $request->pack->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-briefcase"></span></a>
                                      </td>
                                      <td>
                                        <a href="{{ url('trip/details/' . $request->requestable->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-plane"></span></a>
                                      </td>
                                      <td>
                                      {{ Form::open( array('action' => array('HandleRequestsController@acceptRequest', $request->id)))}}
                                      {{ Form::button("<span class='fa fa-check'></span>", array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-primary btn-xs ',
                                        'name' => 'submit',
                                      )) }}
                                      {{ Form::close() }}
                                      </td>                                      
                                      <td>
                                      {{ Form::open( array('action' => array('HandleRequestsController@refuseRequest', $request->id)))}}
                                      {{ Form::button("<span class='fa fa-times'></span>", array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs ',
                                        'name' => 'submit',
                                      )) }}
                                      {{ Form::close() }}
                                      </td>
                                  </tr>
                                  @endif
                              @endforeach
                          @endforeach
                        </tbody>
                        </table>
                      </div>
                  </div>

                  <div class="tab-pane" id="sent-requests">     
                      <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">

                          <thead>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Ver paquete</th>
                            <th>Ver viaje</th>
                          </thead>
                          <tbody>
                          @foreach($user->requests as $request)
                            @if($request->requestable_type=='Pack')
                              <tr>
                                <td>{{$request -> created_at -> format('d/m/y')}}</td>
                                @if($request->status=='accepted')
                                  <td>{{$request -> requestable -> user -> name}} ha aceptado tu viaje</td>
                                @elseif($request->status=='refused')
                                  <td>{{$request -> requestable -> user -> name}} ha rechazado rechazado viaje</td>
                                @elseif($request->status=='onhold')
                                  <td>{{$request -> requestable -> user -> name}} ha recibido tu postulación a paquete</td>
                                @endif
                                <td>
                                  <a href="{{ url('package/details/' . $request->requestable->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-briefcase"></span></a>
                                </td>
                                <td>
                                  <a href="{{ url('trip/details/' . $request->trip->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-plane"></span></a>
                                </td>
                              </tr>
                            @elseif($request->requestable_type=='Trip')
                              <tr>
                                <td>{{$request -> created_at -> format('d/m/y')}}</td>

                                @if($request->status=='accepted')
                                  <td>{{$request -> requestable -> user -> name}} ha aceptado tu paquete</td>
                                @elseif($request->status=='refused')
                                  <td>{{$request -> requestable -> user -> name}} ha rechazado rechazado paquete</td>
                                @elseif($request->status=='onhold')
                                  <td>{{$request -> requestable -> user -> name}} ha recibido tu solicitud de viaje</td>
                                @endif

                                <td>
                                  <a href="{{ url('package/details/' . $request->pack->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-briefcase"></span></a>
                                </td>
                                <td>
                                  <a href="{{ url('trip/details/' . $request->requestable->id) }}" class="btn btn-mini btn-primary btn-xs"><span class="glyphicon glyphicon-plane"></span></a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <br><br><br>
  @include('layouts.footer')
  <script type="text/javascript" src="{{ URL::asset('js/googlePlaces2.js') }}"></script>  
</body>
</html>