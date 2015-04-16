<?php

class UsersProfileController extends BaseController {

	public function showUserProfile($user_id)
	{		//Muestra la página del perfil de otro usuario

		$user = User::findOrFail($user_id);
		return View::make('users_profile')->with('user', $user);
	}

	public function sendMessage($user_id)
	{
		if (Auth::check() && Input::server('REQUEST_METHOD') == 'POST'){
			$sender = User::find(Auth::id());
			$fromMail = $sender -> email;
			$fromName = $sender -> name . " " . $sender -> last_name;
			$sender_data = array(
				"user_id" => $sender->id,
				"name" => $fromName,
				"email" => $fromMail,
				"msg" => Input::get('message')
			);

			$addressee = User::find($user_id);
			$toMail = $addressee->email;
			$toName = $addressee->name;
			Mail::send('email.message', $sender_data, function($message) use ($toMail, $toName, $fromMail, $fromName)
			{
				$message->to($toMail, $toName);
				$message->from($fromMail, $fromName);
				$message->subject('Nuevo mensaje');
			});
			Session::flash('message','Mensaje enviado!');
			Session::flash('class', 'success');
			return Redirect::back();
		}
	}

}
?>