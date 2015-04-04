<?php

class UserController extends BaseController {

	//Función para mostrar la página de login
	public function showLogin()
	{
		//Verifica si se autenticó el usuario
		if(Auth::check()){ 
			//Lo redirige a la página principal de la aplicación
			return Redirect::to('/');
		}else{
			//Muestra la página de login
			return View::make('login');
		}
	}

	//Función para el inicio de sesión
	public function login(){
		//Autentifica al usuario
		if(Auth::attempt(Input::only('email', 'password')))
		{
			//Lo redirige a página correspondiente
			return Redirect::intended('search');			
		}else{
			//Redirecciona a login con mensaje
			return Redirect::back()->with('error_message', 'El correo electrónico y/o contraseña son incorrectos')->withInput(Input::except('password'));
		}
	}

	//Función para cerrar sesión
	public function logout(){
		//Cierra la sesión y redirecciona al usuario al login con mensaje
		Auth::logout();
		return Redirect::to('login')->with('error_message', 'Se ha cerrado sesión exitosamente');
	}

	//Función para actualizar los datos del usuario autentificado.
	function updateUser(){
		$rules = array(
			'name' => 'max:30|required',
			'last_name' => 'max:30|required',
			'birthdate' => 'date|date_format:Y-m-d',
			'email' => 'max:60|email|unique:users,email,'.Auth::user()->id.'|required',
			'password' => 'min:6|max:30|confirmed'
		);

	    $validator = Validator::make(Input::only('name','last_name','birthdate','email','password','password_confirmation'), $rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::except('password','password_confirmation'));
	    }

	    $user = Auth::user();

	    $user->name = Input::get('name');
	    $user->last_name = Input::get('last_name');
	    $user->birthdate = Input::get('birthdate');
	    $user->email = Input::get('email');
	    $user->phone = Input::get('phone');
	    $user->city_id = Input::get('city_id');

	    if(Input::get('password')){
	    	$user->password = Hash::make(Input::get('password'));
	    }

	    $user->save();

		return Redirect::to('search');
	}

	//Función para eliminar del sistema al usuario autentificado.
	function deleteUser(){
		$user = User::find(Auth::user()->id);

		Auth::logout();

		if ($user->delete()) {

        	return Redirect::to('/')->with('msg', 'Tu cuenta ha sido eliminada.');
    	}
	}

}