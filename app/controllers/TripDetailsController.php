<?php

class TripDetailsController extends BaseController {


	public function showWelcome()
	{
		return View::make('trip_details');
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
			return Redirect::to('/trip_details');
		}
	}
}

?>