<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'LoginController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		if(Auth::check()) return Redirect::to('/');
		return View::make('login');
	}

	public function store(){

		if(Auth::attempt(Input::only('email', 'password')))
		{
			return 'Bienvenido '.Auth::user()->name;			
		}
		return Redirect::back()->withInput(Input::except('password'));
	}

	public function destroy(){

		Auth::logout();
		return Redirect::to('login');
	}
}
