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
			return Redirect::intended('upcoming-packages');			
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

		// Reglas para validar la información del formulario.
		$rules = array(
			'name' => 'max:30|required',
			'last_name' => 'max:30|required',
			'birthdate' => 'date|date_format:Y-m-d',
			'email' => 'max:60|email|unique:users,email,'.Auth::user()->id.'|required',
			'password' => 'min:6|max:30|confirmed',
			'picture'=>'image'
		);

		// Se valida la información del formulario.
	    $validator = Validator::make(Input::only('name','last_name','birthdate','email','password','password_confirmation','picture'), $rules);

	    // Si la validación falla, se notifica al usuario los errores.
	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::except('password','password_confirmation','picture'));
	    }

	    $user = Auth::user();

	    // Se actualiza la información del usuario.
	    $user->name = Input::get('name');
	    $user->last_name = Input::get('last_name');
	    $user->birthdate = Input::get('birthdate');
	    $user->email = Input::get('email');
	    $user->phone = Input::get('phone');
	    $user->city_id = Input::get('city_id');

	    // Si se ingresó un nuevo password, se actualiza.
	    if(Input::get('password')){
	    	$user->password = Hash::make(Input::get('password'));
	    }

	    // Si se agregó una imagen, se verifica y se guarda.
	    if( Input::hasFile('picture') ){

	    	// Se obtiene la imagen del formulario.
	    	$uploadedFile = Input::file('picture');

	    	if( $uploadedFile->isValid() ){

	    		$destinantionPath = public_path($user->getImagesPath());

	    		// Si existe en el servidor una imagen con el mismo nombre, notifica el error al usuario.
	    		if( File::exists($destinantionPath.'/'.$uploadedFile->getClientOriginalName()) ){

	    			return Redirect::back()->withErrors(array('picture'=>'Ya existe una imagen con ese nombre.'))->withInput(Input::except('picture','password','password_confirmation'));
	    		}

	    		// Guarda la imagen en el servidor.
				$uploadedFile->move($destinantionPath , $uploadedFile->getClientOriginalName());

				// Guarda la ruta de la imagen en la base de datos.
				$user->picture = $user->getImagesPath() .'/'. $uploadedFile->getClientOriginalName();
	    	}
	    }

	    // Se guarda la información del usuario
	    $user->save();

		return Redirect::to('profile');
	}

	//Función para eliminar del sistema al usuario autentificado.
	function deleteUser(){
		$user = User::find(Auth::user()->id);

		Auth::logout();

		if ($user->delete()) {

        	return Redirect::to('/')->with('msg', 'Tu cuenta ha sido eliminada.');
    	}
	}

	//Función para mostrar el perfil del usuario autentificado.
	function showMyProfile(){

		return View::make('profile');
	}

	//Función para mostrar la página para editar el perfil de usuario.
	function showUpdateUser(){
		
		return View::make('edit-profile');
	}

}