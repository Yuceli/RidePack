<?php

class PasswordRemindersController extends BaseController {

	/*
	--------------------------------------------------------------------------
	|	Password Reminder Controller
	--------------------------------------------------------------------------
	|  Controlador para restablecer contraseña de usuario
	|
	|	Rutas:
	|		Route::any("/request", [
 	|			"as" => "user/request",
 	|			"uses" => "PasswordRemindersController@request"]);
	|
	|		Route::any("/reset/{token}", [
 	|			"as" => "user/reset",
 	|			"uses" => "PasswordRemindersController@reset"]);
	|		
	|	Métodos:
	|		requestPasswordReset()
	|		reset($token)
	|		getPasswordRemindResponse()
	|		isInvalidUser($response)
	|		resetPassword($credentials)
	|		isPostRequest()
	|
	*/



	//Método para procesar la solicitud de reestablecer contraseña
	public function requestPasswordReset()
	{
		//Verifica el tipo de petición
		if ($this->isPostRequest()){
			//Obtiene la respuesta
			$response = $this->getPasswordRemindResponse();
			//Verifica si no es usuario inválido
			if($this->isInvalidUser($response)){
				//En este caso redirecciona con con los campos y con error
				return Redirect::back()
					->withInput()
					->with('error', Lang::get($response));
			}
			//Redirecciona con el status adecuado
			return Redirect::back()
				->with('status', Lang::get($response));
		}
		//Crea la vista para la petición
		return View::make('PasswordRequest');
	}

	//Método para restablecer la contraseña
	public function reset($token)
	{
		//Verifica que sea una solicitud de tipo Post
		if ($this->isPostRequest()){
			//Crea credenciales con los parámetros recbidos
			$credentials = Input::only(
				'email',
				'password',
				'password_confirmation'
			) + compact('token');

			//Restablece la contraseña
			$response = $this->resetPassword($credentials);

			//si se restableción la contraseña muestra la página de login
			if($response === Password::PASSWORD_RESET) {
				return Redirect::action('UserController@showLogin');
			}
			//En caso contrario se redirecciona con errores
			return Redirect::back()
				->withInput()
				->with('error', Lang::get($response));
		}
		//Muestra la vista para restablecer contraseña
		return View::make('ResetPassword', compact('token'));
	}

	//Método para obtener la respuesta de contraseña 
	protected function getPasswordRemindResponse()
	{
		return Password::remind(Input::only('email'), function($message){
			$message->subject(trans('Restablecer Contraseña!'));
		});
	}

	//Método para verificar si el usuario es un usuario válido.
	protected function isInvalidUser($response)
	{
		return $response === Password::INVALID_USER;
	}

	//Metodo para restablecer contraseña
	protected function resetPassword($credentials)
	{
		return Password::reset($credentials, function($user, $pass) {
			//Se restablece la contraseña del usuario y se guarda en la base de datos
			$user->password = Hash::make($pass);
			$user->save();
		});
	}

	//Método que verifica si la petición es de tipo Post
	protected function isPostRequest()
	{
		return Input::server('REQUEST_METHOD') == 'POST';
	}
}