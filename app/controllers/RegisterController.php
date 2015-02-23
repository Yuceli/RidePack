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
		$password = Crypt::encrypt(Input::get('password'));

		DB::beginTransaction();
		$id = DB::table('users')->insertGetId(
		    array('email' => $email, 'name' => $name, 'last_name' => $last_name, 'password' => $password, 'city_id' => 1)
		);
		DB::commit();
		return View::make('login');
	}

}
