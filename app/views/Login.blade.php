@include('layouts.login.header')
 
  <div class="container container-login">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
          <div>
            <div id="login">
              <img class="profile-img" src="https://s3.amazonaws.com/FringeBucket/default-user.png"
              alt="">
              <hr class="colorgraph">
              {{Form::open(array('class'=>'form-signin'))}}
              @if(Session::has('error_message') )
              <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong >{{ Session::get('error_message') }}</strong> 
              </div>

              @endif

              @if(Session::has('message') )
              <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong >{{ Session::get('message') }}</strong> 
              </div>

              @endif
              <br>

              {{Form::email('email', '',array('class' => 'form-control', 'type' => 'email' ,'placeholder' => 'email' , 'required' => 'required'))}}
              <!--<input type="text" class="form-control" name="email" placeholder="email" required autofocus>-->
              <br>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <p class="text-left"><a align="left" href="request">¿Olvidaste tu contraseña?</a></p>
              <br>
                      <!--<input type="submit" class="btn btn-lg btn-default btn-block" value="Sign In" />
                      <br>-->
                      <div class="col-xs-12 col-md-6"><input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                      {{Form::close()}}
                      <div id="tabs" data-tabs="tabs">
                        <p class="text-center"><a href="register">¿Necesitas una cuenta?</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
  @include('layouts.footer')      
  </body>
  </html>