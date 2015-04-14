<?php 
 	if(isset($returned)){
 		$errors = (isset($returned["errors"]))? $returned["errors"]:$errors;
 	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RidePack</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.css">
  	<link rel="stylesheet" href="plugins/prism/prism.css">
	<!-- Theme CSS -->  
	<link id="theme-style" rel="stylesheet" href="css/styles.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
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
                        <li class="nav-item"><a class="scrollto" href="#about">Nosotros</a></li>
                        <li class="nav-item"><a class="scrollto" href="#features">Caracteristicas</a></li>                        
                        <li class="nav-item last"><a class="scrollto" href="#contact">Contacto</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header--> 

	<br><br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				{{Form::open(array('action' => 'RegisterController@register', 'method' => 'post'))}}
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
					
					<div class="col-xs-8 col-sm-9 col-md-9">
						Al hacer click en <strong class="label label-primary">Registrar</strong> , tu aceptas los <a href="#" data-toggle="modal" data-target="#t_and_c_m">términos y condiciones</a> de éste sitio, incluyendo el uso de Cookies.
					</div>
				</div>
				
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
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
					<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>


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
          <script type="text/javascript" src="plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script> 
          <script type="text/javascript" src="plugins/prism/prism.js"></script>    
          <script type="text/javascript" src="js/main.js"></script>  

</body>
</html>