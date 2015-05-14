@include('layouts.header')
 <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <div class="container">            
            <h1 class="logo pull-left">
                <a class="scrollto" href="#promo">
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
                        <li class="nav-item"><a href="login">Login</a></li>                        
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header--> 

	
	<div class="container register-wrap">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				{{Form::open(array('action' => 'RegisterController@registerUser', 'method' => 'post'))}}
				<h2>Únete hoy a RidePack</h2>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							@if($errors -> has("name"))
									@foreach ($errors->get('name') as $message)
									    {{$message}} <br>
									@endforeach
							@endif
							{{Form::text('name', '',array('class' => 'form-control input-lg', 'placeholder' => 'Nombre' , 'required' => 'required' , 'tabindex' => '1'))}}
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							@if($errors -> has("last_name"))
									@foreach ($errors->get('last_name') as $message)
									    {{$message}} <br>
									@endforeach
							@endif
							{{Form::text('last_name', '',array('class' => 'form-control input-lg', 'placeholder' => 'Apellido' , 'required' => 'required', 'tabindex' => '2'))}}
						</div>
					</div>
				</div>
				<div class="form-group">
					@if($errors -> has("email"))
							@foreach ($errors->get('email') as $message)
							    {{$message}} <br>
							@endforeach
					@endif
					{{Form::text('email', '',array('class' => 'form-control input-lg', 'placeholder' => 'Email' , 'required' => 'required','tabindex' => '4'))}}
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							@if($errors -> has("password"))
								@foreach ($errors->get('password') as $message)
								    {{$message}} <br>
								@endforeach
							@endif
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" required="required" tabindex="5">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" required="required" placeholder="Confirmar contraseña" tabindex="6">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-11 col-sm-12 col-md-12">
						Al hacer click en <strong class="label label-primary">Registrar</strong> , tu aceptas los <a href="#" data-toggle="modal" data-target="#t_and_c_m">el aviso de privacidad</a> de éste sitio, incluyendo el uso de Cookies.
					</div>
				</div>
				
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-6 btn-wrap"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
					<div class="col-xs-12 col-md-6"><a href="login" class="btn btn-success btn-block btn-lg">Login</a></div>
				</div>
			{{Form::close()}}
		</div>
	</div>


	<!-- Modal TERMINOS Y CONDICIONES -->
	<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Aviso de privacidad</h4>
				</div>
				<div class="modal-body">
					<p>En "RidePack" estamos comprometidos a proteger tu privacidad, así como a hacer
					uso correcto de tus datos personales de conformidad con lo que exige la ley.
					Con fundamento en los artículos 15 y 16 de la Ley Federal de Protección de Datos Personales
					en Posesión de Particulares hacemos de tu conocimiento que "RidePack"
					es responsable de recabar sus datos personales, del uso que se le dé a los mismos y de su
					protección.<br><br>
					En "RidePack" no transferiremos tus datos personales a terceros ajenos a nuestra
					organización.
					La empresa divulgará su información personal solamente si así debe hacerlo por ley o por mandato
					de los procesos legales relacionados con el sitio; o para proteger y defender los derechos de
					propiedad de "RidePack". Si hubiera cambios y/o actualizaciones en los Aviso de
					Privacidad también se actualizará la fecha de "última actualización" de este aviso y aparecerá
					un aviso destacado informando de esta situación.<br><br> 

                    Última Actualización: 15 de abril de 2015</p>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>


 <br><br><br>
          @include('layouts.footer') 

</body>
</html>