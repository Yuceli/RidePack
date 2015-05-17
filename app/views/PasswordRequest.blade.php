@include('layouts.login.header')

  @if(Auth::check())
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
              <li class="active nav-item sr-only"><a class="scrollto" href="{{URL::to('/')}}">Home</a></li>
              <li class="nav-item"><a href="{{ URL::asset('profile')}}">Perfil</a></li>
              <li class="nav-item"><a href="{{ URL::asset('upcoming/trips')}}">Buscar</a></li>
              <li class="nav-item"><a href="{{ URL::asset('post/package')}}">Publicar paquete</a></li>                        
              <li class="nav-item" ><a href="{{ URL::asset('post/trip')}}">Publicar viaje</a></li>
              <li class="nav-item last"><a href="{{URL::to('logout')}}">Cerrar sesión</a></li>
            </ul><!--//nav-->
          </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
      </div>
    </header><!--//header-->
  @endif
    
	<div class="container container-reset">
    	<div class="row">
        	<div class="col-sm-6 col-md-4 col-md-offset-4">
            	<div class="account-wall">
                	<div>
                    <hr class="colorgraph">
                    
            		    <div id="login" align="center">  
                      {{ Form::open(array('class'=>'form-signin')) }}
                        @if (Session::get("error"))
                          {{ Session::get("error") }}
                        @endif
                        @if (Session::get("status"))
                          {{ Session::get("status") }}
                        @endif
                        <!--{{ Form::text("email", Input::old("email")) }}-->
                        {{Form::text('email',  Input::old('email') , array('id'=>'weight','class'=>'form-control input-lg','placeholder'=>'Email','tabindex'=>'3','required'=>'true','min'=>'0'));}} 
                        <br />
                        <!--{{ Form::submit("Reenviar") }}-->
                        {{Form::submit('Restablecer contraseña', array('class'=>'btn btn-primary btn-block btn-lg','tabindex'=>'11'))}}
                        
                      {{ Form::close() }}
                    </div>
                    <hr class="colorgraph">
            			</div>
          		</div>
        	</div>
      </div>
  </div>


<br><br>
     @include('layouts.footer')    

</body>
</html>