<?php

class UsersProfileController extends BaseController {

	public function showUserProfile($user_id)
	{		
		if($user_id == Auth::id()){
			return Redirect::to('profile');
		}
		//Muestra la página del perfil de otro usuario
		$user = User::findOrFail($user_id);
		return View::make('UsersProfile')->with('user', $user);
	}

	public function sendMessage($user_id)
	{
		//Se determina si el usuario esta logeado y que el metodo de solicitud sea POST
		if (Auth::check() && Input::server('REQUEST_METHOD') == 'POST'){
			//Se obtienen los datos del remitente
			$sender = User::find(Auth::id());
			$fromMail = $sender -> email;
			$fromName = $sender -> name . " " . $sender -> last_name;
			$sender_data = array(
				"user_id" => $sender->id,
				"name" => $fromName,
				"email" => $fromMail,
				"msg" => Input::get('message')
			);
			//Se obtienen los datos del destinatario
			$addressee = User::find($user_id);
			$toMail = $addressee->email;
			$toName = $addressee->name;
			//Se envia el correo con la vista email/message, con la información del remitente
			Mail::send('email.message', $sender_data, function($message) use ($toMail, $toName, $fromMail, $fromName)
			{
				//Correo y nombre del destinatario
				$message->to($toMail, $toName);
				//Correo y nombre del remitente
				$message->from($fromMail, $fromName);
				//Asunto del correo
				$message->subject('Nuevo mensaje');
			});
			//Mensaje de envio correcto
			Session::flash('message','Mensaje enviado!');
			Session::flash('class', 'success');
			//Regresa a la vista UsersProfile
			return Redirect::back();
		}
	}

}
?>