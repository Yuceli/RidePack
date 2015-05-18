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
	|		Route::post('/trip/details/{id}/rate', 'TripDetailsController@rateUser');
	|	
	|	Métodos:
	|		showTripDetails($id)
	|		sendRequest($id)
	|		rateUser($id)
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
			$trip = Trip::findOrFail($id);
			//Obtiene al usuario ligado al viaje.
			$user = $trip -> user;
			//Se obtienen los paquete relacionado con el viaje.
			$tripPacks = $trip->packs;
			//Obtiene al usuario autenticado.
			$authUser = Auth::user();
			//Paquetes que coinciden con el viaje.
			$matchPacks = $authUser->getPacksMatchTrip($trip);
			//Solicitudes de viajes
			$canRate = false;
			$myPetitions = $trip->requests()->where('from_user', $authUser->id)->where('status', 'accepted')->get();
			if(sizeof($myPetitions->toArray()) > 0 ){
				$canRate = true;
			}

			//Crea la vista que muestra los detalles del viaje, pasando los datos del viaje, usuario y otros viajes.
			return View::make('TripDetails', compact('trip', 'user','authUser','matchPacks','tripPacks', 'canRate'));
		}
	}

	/*
	* Función que almacena una petición a un viajero para transportar un paquete.
	* Hace referencia al caso de uso CU-24 Solicitar Viajero
	*/
	public function sendRequest($id)
	{
		//Busca el viaje que tenga el id igual al recibido.
		$trip = Trip::find($id);
		//Se obtiene el usuario autenticado.
		$user = Auth::user();

		//Se obtiene el id del paquete seleccionado en la lista.
		if( !($requestPackID = Input::get('requestPackID')) ){
			//Si no se recibió ningún id se regresa un mensaje de error.
			Session::flash('message','Para solicitar el viaje debes seleccionar un paquete');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		// Se obtiene el paquete seleccionado de la lista.
		if( !($pack = $user->getPacksMatchTrip($trip)->find($requestPackID)) ){
			//Si el paquete no es válido se regresa un mensaje de error.
			Session::flash('message','El paquete seleccionado no es válido.');
			Session::flash('class', 'danger');
			return Redirect::back();
		}

		
		//Se obtienen las peticiones hechas al viaje por el usuario autenticado.
		$myPetitions = $trip->requests()->where('from_user', $user->id)->get();

		//Este if busca discriminar si la petición es valida, es decir si ya sea ha postulado antes.
		if( sizeof($myPetitions->toArray())==0 )
		{
			//Se crea una nueva petición
			$petition = new Petition;
			//Se buscan todas las peticiones ligadas al usuario autenticado.
			$petition->from_user = $user->id;
			//Se agrega que las peticiones deben tener como status "onhold".
			$petition->status = 'onhold';
			//Se agrega el id del paquete relacionado con la petición.
			$petition->pack_trip_id = $pack->id;
			
			//Este if ocurre si la petición se ha guardado correctamente y redirige a la vista management
			if($trip->requests()->save($petition))
			{
				Session::flash('message','La petición ha sido registrada');
				Session::flash('class', 'success');
				return Redirect::to('/handle/request');
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

	public function rateUser($id){
		$trip = Trip::find($id);
		$user = Auth::user();
		//obtenemos las requests que han sido aceptadas.
		$myPetitions = $trip->requests()->where('from_user', $user->id)->where('status', 'accepted')->get();
		//verificamos si ya ha asignado una calificacion a este usuario. 
		$userRate = DB::select("select * from rates where id_user_rated = ? AND from_user = ?", array($trip -> user_id, $user -> id));

		if(sizeof($myPetitions->toArray()) > 0){
			$rate = Input::get('rate');
			//guardamos o actualizamos una calificación.
			if(count($userRate) > 0){
				DB::update("update rates set rate = ? where id_user_rated = ? AND from_user = ?", array($rate, $trip -> user_id, $user -> id));
			}
			else{
				DB::insert("insert into rates (id_user_rated, from_user, rate) values (?, ?, ?)", array($trip -> user_id, $user -> id, $rate));
			}
			//calculamos la nueva calificacion del usuario.
			$userRated = User::find($trip -> user_id);
			$userRates = DB::select("select * from rates where id_user_rated = ?", array($trip -> user_id));
			$averageRate = 0;
			for($i = 0; $i < count($userRates) ; $i++) { 
				$averageRate+= $userRates[$i]-> rate;
			}
			//$averageRate = $averageRate / count($results);
			$ratedUser = User::find($trip -> user_id);
			$ratedUser -> total_rating = $averageRate;
			$ratedUser -> number_ratings = count($userRates);
			$ratedUser -> save();

			//regresamos al usuario donde estaba.
			Session::flash('message', 'Calificacion guardada.');
			Session::flash('class', 'success');
			return Redirect::back();
		}
		else{
			//regresamos al usuario donde estaba.
			Session::flash('message', 'El usuario no transporto este paquete. No puede ponerle una calificación.');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
	}

}

?>