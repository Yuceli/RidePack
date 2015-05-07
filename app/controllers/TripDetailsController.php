<?php

class TripDetailsController extends BaseController {


	public function showWelcome()
	{
		return View::make('TripDetails');
	}
	
	public function showTripDetails($id){
		//Se determina ue el usuario este logeado
		if (Auth::check()){
			//Se busca el viaje de acuerdo al id
			$trip = Trip::find($id);
			//Se obtiene el id del usuario de acuerdo al viaje a visualizar
			$user_id = $trip -> user_id;
			//Se busca el usuario de acuerdo al id
			$user = User::find($user_id);
			//Se obtienen los viajes del usuario
			$trips = $user -> trips;
			//Carga la vista TripDetails con las varibles "trip", "user" y "trips"
			return View::make('TripDetails', compact("trip", "user", "trips"));
		}
	}

	/*
	* Función que almacena una petición a un viajero para transportar un paquete.
	* Hace referencia al caso de uso CU-24 Solicitar Viajero
	*/
	public function sendRequest($id)
	{
			$myPetitions = Petition::where('from_user', '=', Auth::id())->where('requestable_id', '=', $id) -> where('requestable_type','Trip') ->get();
			if( sizeof($myPetitions->toArray())==0 )
			{
				$petition = new Petition;
				$petition->from_user = Auth::id();
				$petition->status = 'onhold';
				$trip = Trip::find($id);

				if($petition->save() && $trip->requests()->save($petition))
				{
					Session::flash('message','La petición a sido registrada');
					Session::flash('class', 'success');
					return Redirect::to('/management');
				}
				else
				{
					Session::flash('message', 'Ocurrió un error con la petición. Intente nuevamente');
					Session::flash('class', 'danger');
					return Redirect::back();
				}
			}
			else
			{
				Session::flash('message', 'Ya se postuló antes. No puede postularse más de una vez');
				Session::flash('class', 'danger');
				return Redirect::back();
			}
		
	}
}

?>