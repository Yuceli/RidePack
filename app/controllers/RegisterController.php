<?php

class RegisterController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'RegisterController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('register');
	}

	public function register($params = array())
	{
		$user = new User;
		$name = Input::get('name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$password = Input::get('password');
		$password_confirmation = Input::get('password_confirmation');

		/* /[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i */
		/* '/[^0-9]/' */

		Validator::extend('validpass', function($attribute, $value, $parameters)
		{
			if(preg_match('/[^0-9]/', $value) || preg_match('/^[a-zA-Z\d]+$/', $value) || substr($value, 0) == "_"){
				return false;
			}
		    return true;
		});

		Validator::extend('validlastname', function($attribute, $value, $parameters)
		{
			$rexSafety = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";
			$rexSafety2 = '/[0-9]/';
			if (preg_match($rexSafety, $value) or preg_match($rexSafety2, $value)) {
			    return false;
			}
			return true; 
		});
		
		Validator::extend('validname', function($attribute, $value, $parameters)
		{
			$rexSafety = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";
			$rexSafety2 = '/[0-9]/';
			if (preg_match($rexSafety, $value) or preg_match($rexSafety2, $value)) {
			    return false;
			}
			return true; 
		});

		
		Validator::extend('validemail', function($attribute, $value, $parameters)
		{
			if($value[0] == "_"){
				return false;
			}
		    return true;
		});

		$messages = array(
		    'last_name.validlastname' => 'Apellido no cumple las reglas de un apellido válido.',
		    'name.validname' => 'Nombre no cumple las reglas de un nombre válido.',
		    'password.validpass' => 'La contraseña no cumple con las reglas de una contraseña válida',
		    'email.validemail' => 'El correo electrónico no cumple con las reglas de un correo electrónico válido'
		);

		$validator = Validator::make(
		    array('name' => $name, 'last_name' => $last_name, 'email' => $email, 'password' => $password, 'password_confirmation' => $password_confirmation),
		    array('name' => 'required|min:1|validname|max:30', 'last_name' => 'required|min:1|validlastname|max:30', 'email' => 'required|email|validemail|unique:users', 'password' => 'required|min:6|max:20|same:password_confirmation'),
		    $messages
		);

		if ($validator->fails())
	    {
	        return Redirect::back()->withInput(Input::except('password'))->withErrors($validator);
	    }
	    else{

			$user -> name = Input::get('name');
			$user -> last_name = Input::get('last_name');
			$user -> email = Input::get('email');
			$user -> password = Hash::make(Input::get('password'));
			$user -> save();

			if(Auth::attempt(array("email" => $user -> email, "password" => Input::get('password'))))
			{
				return Redirect::intended('profile');			
			}
			return Redirect::Redirect('login')->with('message', "Registro Exitoso, inicia sesión.");
		}	
	}

}
