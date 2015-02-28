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
            <div class="tab-pane active" id="login">
                      <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                    <hr class="colorgraph">
                    {{Form::open(array('url' => 'store', 'class'=>'form-signin'))}}
                      <br>
                      {{Form::text('email', '',array('class' => 'form-control', 'placeholder' => 'email' , 'required' => 'required'))}}
                      <!--<input type="text" class="form-control" name="email" placeholder="email" required autofocus>-->
                      <br>
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                      <br>
                      <!--<input type="submit" class="btn btn-lg btn-default btn-block" value="Sign In" />
                      <br>-->
                      <div class="col-xs-12 col-md-6"><input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                    {{Form::close()}}
                    <div id="tabs" data-tabs="tabs">
                      <p class="text-center"><a href="register">Need an Account?</a></p>
                      </div>
            </div>
          </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>