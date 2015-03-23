<?php

class UserController extends BaseController {

//Función para el inicio de sesión
public function login()
	{
		//Verifica si se autenticó el usuario
		if(Auth::check()){ 
			//Lo redirige a la página principal de la aplicación
			return Redirect::to('/');
		}else{
			//Regresa al login
			return View::make('login');
		}
	}

//Función para almacenar al usuario
	public function upcomingTrips(){
		//Autentifica al usuario
		if(Auth::attempt(Input::only('email', 'password')))
		{
			//Lo redirige a página correspondiente
			return View::make('upcoming-trips');			
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

}