<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RidePack</title>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

   <link rel="stylesheet" href="css/login.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-sm-6 col-md-4 col-md-offset-4">
            	<div class="account-wall">
                	<div id="my-tab-content" class="tab-content">
            			<div class="tab-pane active" align="center">
							<h2>RESTABLECER CONTRASEÑA</h2>
							<div>
								Da clic en el siguiente enlace para restablecer tu contraseña:<br/>
                <a href={{ URL::route('user/reset', array($token)) }}>RESTABLECER CONTRASEÑA</a><br/>
								ATENCIÓN: EL ENLACE CADUCARÁ EN 24HRS.
							</div>
						</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</body>
</html>