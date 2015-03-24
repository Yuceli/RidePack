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

	public function register($params = array()){
		$name = Input::get('name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$password = Input::get('password');
		$password_confirmation = Input::get('password_confirmation');

		



		$validator = Validator::make(
		    array('name' => $name, 'last_name' => $last_name, 'email' => $email, 'password' => $password, 'password_confirmation' => $password_confirmation),
		    array('name' => 'required|min:1', 'last_name' => 'required|min:1', 'email' => 'required|email|unique:users', 'password' => 'required|min:8|same:password_confirmation')
		);

		 if ($validator->fails())
	    {
	        return View::make('register')->withReturned(array("data_set" => "1","errors" => $validator -> messages(), "name" => $name, "last_name" => $last_name, "email" => $email));
	    }

		DB::beginTransaction();
		$id = DB::table('users')->insertGetId(
		    array('email' => $email, 'name' => $name, 'last_name' => $last_name, 'password' => Hash::make($password))
		);
		DB::commit();
		return View::make('login')->with('message', "Registro Exitoso, inicia sesión.");
	}

}
