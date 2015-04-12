<?php

class PackageDetailsController extends BaseController {


	public function showWelcome()
	{
		return View::make('package_details');
	}

	public function sendMessage()
	{
		if (Auth::check()){
			$message = new Message;
			$message->from_user = Auth::id();
			$message->content = Input::get('message');
			$message->status = 'sent';
			if($message->save()){
				Session::flash('message','Mensaje enviado!');
				Session::flash('class', 'success');
			}
			else{
				Session::flash('message', 'Error al enviar el mensaje!');
				Session::flash('class', 'danger');
			}
			return Redirect::to('/package_details');
		}
	}

	public function showDetails($id){
		if (Auth::check()){
			$pack = Pack::find($id);
			$user_id = $pack -> user_id;
			$user = User::find($user_id);
			$trips = $user -> trips;
			return View::make('package_details', compact("pack", "user", "trips"));
		}
	}

}

?>