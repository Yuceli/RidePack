<?php 


class HandleRequestsController extends BaseController {


	public function showWelcome()
	{
		$user = Auth::user();

		return View::make('handle_requests')->withUser($user);
	}

	public function acceptRequest($id){
		// Se obtiene la petición
		$petition = Petition::findorFail($id);

		// Se verifica que siga en espera.
		if($petition -> status == "onhold"){

			// Se inicializan las variables.
			$trip = null;
			$pack = null;

			// Si la petición fue hecha a un paquete.
			if($petition->requestable_type == 'Pack'){

				// Se obtiene el viaje y el paquete asociados con la petición.
				$trip = $petition->trip;
				$pack = $petition->requestable;

				if(count($pack->trips) > 0) {
					return Redirect::back()
						->withMessage('El paquete ya esta siendo transportado.')
						->withClass('danger');
				}
			}
			// Si la petición fue hecha a un viaje.
			else if($petition->requestable_type == 'Trip'){

				// Se obtiene el viaje y el paquete asociados con la petición.
				$pack = $petition->pack;
				$trip = $petition->requestable;
			}
			else {
				return Redirect::back()
					->withMessage('El tipo de petición es inválido. Notifica a la administración.')
					->withClass('danger');
			}

			// Si ya no existe el viaje asociado se cancela la petición y se envía un mensaje de error.
			if(!$trip){
				Session::flash('message','No se pudo aceptar la petición. El viaje asociado con la petición fue eliminado.');
				Session::flash('class', 'danger');
				return Redirect::back();
			}
			// Si ya no existe el paquete asociado se cancela la petición y se envía un mensaje de error.
			if(!$pack){
				Session::flash('message','No se pudo aceptar la petición. El paquete asociado con la petición fue eliminado.');
				Session::flash('class', 'danger');
				return Redirect::back();
			}
			
			// Se asocia el paquete con el viaje donde será transportado.
			$pack->trips()->attach($trip->id);

			// Se cambia el estado de la petición a aceptado.
			$petition -> status = "accepted";
			$petition -> save();

			// Se notifica al usuario que su petición fue aceptada.
			Session::flash('message','La petición ha sido aceptada');
			Session::flash('class', 'success');
			return Redirect::to('/handle/request');
		}
		if($petition -> status == "accepted"){
			Session::flash('message','La petición ya habia sido aceptada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		if($petition -> status == "refused"){
			Session::flash('message','La petición ya habia sido rechazada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		if($petition -> status == "finished"){
			Session::flash('message','La petición ya no es válida o ha sido terminada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
	}

	public function refuseRequest($id){
		$petition = Petition::findorFail($id);

		if($petition -> status == "onhold"){
			$petition -> status = "refused";
			$petition -> save();
			Session::flash('message','La petición a sido rechazada');
			Session::flash('class', 'success');
			return Redirect::to('/handle/request');
		}
		if($petition -> status == "accepted"){
			Session::flash('message','La petición ya habia sido aceptada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		if($petition -> status == "refused"){
			Session::flash('message','La petición ya habia sido rechazada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		if($petition -> status == "finished"){
			Session::flash('message','La petición ya no es válida o ha sido terminada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
	}

}




