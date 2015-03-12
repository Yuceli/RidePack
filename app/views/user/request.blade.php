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
                    {{ Form::open() }}
                      @if (Session::get("error"))
                        {{ Session::get("error") }}<br />
                      @endif
                      @if (Session::get("status"))
                        {{ Session::get("status") }}<br />
                      @endif
                      {{ Form::label("email", "Email") }}
                      {{ Form::text("email", Input::old("email")) }}
                      {{ Form::submit("reset") }}
                    {{ Form::close() }}
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</body>
</html>