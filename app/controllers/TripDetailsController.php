<?php

class TripDetailsController extends BaseController {

		/*
	--------------------------------------------------------------------------
	|	Trip Details Controller
	--------------------------------------------------------------------------
	|  Controlador para los detalles de los paquetes
	|	Rutas:
	|		Route::get('/trip/details/{id}', 'TripDetailsController@showTripDetails');
	|		Route::post('/trip/details/{id}', 'TripDetailsController@sendRequest');
	|
	|	Métodos:
	|		showPackDetails($id)
	|		sendRequest($id)
	|
	*/


	//Esta función crea la vista TripDetails sin mandar ningun dato para que funcione.
	public function showWelcome()
	{
		return View::make('TripDetails');
	}

	//Esta función crea la vista TripDetails sin mandar ningun dato para que funcione.
	public function showTripDetails($id){
		//Checa si el usuario ha sido autenticado.
		if (Auth::check()){
			//Busca el viaje por el id por el parametro recibido.
			$trip = Trip::find($id);
			//Recpera id del usuario que realiza del viaje.
			$user_id = $trip -> user_id;
			//Busca al usuario ligado al viaje.
			$user = User::find($user_id);
			//Recibe los viajes del dueño del uusario ligado al viaje.
			$trips = $user -> trips;
			//Crea la vista que muestra los detalles del viaje, pasando los datos del viaje, usuario y otros viajes.
			return View::make('TripDetails', compact("trip", "user", "trips"));
		}
	}

	/*
	* Función que almacena una petición a un viajero para transportar un paquete.
	* Hace referencia al caso de uso CU-24 Solicitar Viajero
	*/
	public function sendRequest($id)
	{
			/*Esta es la petición a la base de datos, donde se pide todas las peticiones relacionadas con el usuario autenticado,
			el creaddor de la petición tenga un id igual al recibido y el tipo de la petición es trip*/
			$myPetitions = Petition::where('from_user', '=', Auth::id())->where('requestable_id', '=', $id) -> where('requestable_type','Trip') ->get();
			//Este if busca discriminar si la petición es valida, es decir si ya sea ha postulado antes.
			if( sizeof($myPetitions->toArray())==0 )
			{
				//Se crea una nueva petición
				$petition = new Petition;
				//Se buscan todas las peticiones ligadas al usuario autenticado.
				$petition->from_user = Auth::id();
				//Se agrega que las peticiones deben tener como status "onhold".
				$petition->status = 'onhold';
				//Busca el viaje que tenga el id igual al recibido.
				$trip = Trip::find($id);
				//Este if ocurre si la petición se ha guardado correctamente y redirige a la vista management
				if($petition->save() && $trip->requests()->save($petition))
				{
					Session::flash('message','La petición ha sido registrada');
					Session::flash('class', 'success');
					return Redirect::to('/management');
				}
				//En caso de que haya un error se manda un mensaje y redirige de vuelta a la ultima vista.
				else
				{
					Session::flash('message', 'Ocurrió un error con la petición. Intente nuevamente');
					Session::flash('class', 'danger');
					return Redirect::back();
				}
			}
			//En caso de que uno ya se haya postulado antes se manda un mensaje y se envia de vuelta a la ultima vista.
			else
			{
				Session::flash('message', 'Ya se postuló antes. No puede postularse más de una vez');
				Session::flash('class', 'danger');
				return Redirect::back();
			}
		
	}
}

?>