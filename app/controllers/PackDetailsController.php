<?php

class PackDetailsController extends BaseController {

	/*
	--------------------------------------------------------------------------
	|	Pack Details Controller
	--------------------------------------------------------------------------
	|  Controlador para los detalles de los paquetes
	|	Rutas:
	|		Route::get('/package/details/{id}', 'PackDetailsController@showPackDetails');
	|		Route::post('/package/details/{id}', 'PackDetailsController@sendRequest');
	|		Route::post('/package/details/{id}', 'PackDetailsController@sendRequest');
	|
	|	Métodos:
	|		showPackDetails($id)
	|		sendRequest($id)
	|
	*/


	//Esta función crea la vista PackDetails, recibiendo un id y mandando los detalles del paquete, el usuario y los viajes.
	public function showPackDetails($id){
		//Checa si el usuario ha sido autenticado.
		if (Auth::check()){
			//Busca el paquete por el id por el parametro recibido.
			$pack = Pack::findOrFail($id);
			//Busca al usuario dueño del paquete.
			$user = $pack -> user;
			//Se obtiene el viaje relacionado con el paquete.
			$packTrip = $pack->trips->first();
			//Obtiene al usuario autenticado.
			$authUser = Auth::user();
			//Crea la vista que muestra los detalles del paquete, pasando los datos del paquete, usuario y viajes.
			return View::make('PackDetails', compact('pack', 'user','authUser','packTrip'));
		}
	}

	//Esta función recibe un id y envia una petición a la base de datos.
	public function sendRequest($id)
	{
		//Se obtiene el usuario autenticado.
		$user = Auth::user();
		//Se pide que se encuentren los paquetes iguales al id.
		$pack = Pack::find($id);

		if(count($pack->trips) > 0) {
			return Redirect::back()
				->withMessage('No se pudo enviar la solicitud. El paquete ya esta siendo transportado.')
				->withClass('danger');
		}
		/*Esta es la petición a la base de datos, donde se pide todas las peticiones relacionadas con el usuario autenticado
		y el creaddor de la petición tenga un id igual al recibido.*/
		$myPetitions = $pack->requests()->where('from_user', $user->id)->get();

		//Este if busca discriminar si la petición es valida, es decir si ya sea ha postulado antes.
		if( sizeof($myPetitions->toArray())==0 )
		{	
			// Busca si el solicitante tiene un viaje que cumpla con el origen y destino del paquete,
			$trip = $user->trips()
				->where('departure_city', $pack->from_city)
				->where('arrival_city',   $pack->to_city)
				->where('departure_date', $pack->sending_date->toDateString())
				->where('arrival_date',   $pack->arrival_date->toDateString())
				->first();

			// Sino crea el viaje con las características del paquete.
			if(!$trip){
				$trip = new Trip;
				$trip->departure_city	= $pack->from_city;
				$trip->arrival_city		= $pack->to_city;
				$trip->departure_date	= $pack->sending_date;
				$trip->arrival_date		= $pack->arrival_date;
				$trip->max_weight		= $pack->weight;
				$trip->max_size			= $pack->size;
				$trip->transport		= 'Vía terrestre';
				$trip->carry_reward		= $pack->reward;
				$trip->user_id			= $user->id;
				$trip->save();
			}

			//Se crea una nueva petición
			$petition = new Petition;
			//Se liga la petición al usuario autenticado.
			$petition->from_user = $user->id;
			//Se liga la petición al viaje creado.
			$petition->pack_trip_id = $trip->id;
			//Se agrega que las peticiones deben tener como status "onhold".
			$petition->status = 'onhold';
			
			//Este if ocurre si la petición se ha guardado correctamente y redirige a la vista management.
			if($pack->requests()->save($petition))
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

}

?>