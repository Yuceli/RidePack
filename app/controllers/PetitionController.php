<?php 


class PetitionController extends BaseController {

	/*
	--------------------------------------------------------------------------
	|	Petition Controller
	--------------------------------------------------------------------------
	|  Controlador para el manejo de las peticiones de viajes y paquetes
	|
	|	Rutas:
	|		Route::post('/handle/request/accpet/{id}', 'PetitionController@acceptPetition');
	|		Route::post('/handle/request/refuse/{id}', 'PetitionController@rejectPetition');
	|		Route::get('/handle/request', 'PetitionController@showPetitions');
	|
	|	Métodos:
	|		showPetitions();
	|		acceptPetitions($id);
	|		rejectPetitions($id);
	|		
	*/


	//Función que se encarga de mostrar las peticiones de un usuario.
	public function showPetitions()
	{
		//Usuario auntenticado
		$user = Auth::user();
		//Crea vista de peticiones
		return View::make('Petition')->withUser($user);
	}

	//Se encarga de gestionar las peticiones que se debn de aceptar
	public function acceptPetition($id){
		// Se obtiene la petición
		$petition = Petition::findorFail($id);

		// Se verifica que siga en espera.
		if($petition -> status == 'onhold'){

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
			$petition -> status = 'accepted';
			$petition -> save();

			// Se notifica al usuario que su petición fue aceptada.
			Session::flash('message','La petición ha sido aceptada');
			Session::flash('class', 'success');
			return Redirect::to('/handle/request');
		}
		//Si el estado de la petición es accepted muestra mensaje de error yy redirecciona al usuario
		if($petition -> status == 'accepted'){
			Session::flash('message','La petición ya habia sido aceptada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		//Si el estado es refuse indica que la petición ya había sido rechazada
		//Redirecciona al usuario
		if($petition -> status == 'refused'){
			Session::flash('message','La petición ya habia sido rechazada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		//Si la petición tiene estado finished, indica ue la petición no es válida y redirecciona
		if($petition -> status == 'finished'){
			Session::flash('message','La petición ya no es válida o ha sido terminada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
	}

	//Método para rechazar peticiones
	public function rejectPetition($id){
		//Busca la petición
		$petition = Petition::findorFail($id);

		//Se revisa el estado de la petición

		//Si el estado es onhold
		if($petition -> status == 'onhold'){
			//Cambia estado a refused y muestra mensaje de rechazo
			$petition -> status = 'refused';
			$petition -> save();
			Session::flash('message','La petición ha sido rechazada');
			Session::flash('class', 'success');
			//Se redirecciona
			return Redirect::to('/handle/request');
		}

		//Si el estado es accepted, muestra mensaje correspondiente y redireciona
		if($petition -> status == 'accepted'){
			Session::flash('message','La petición ya habia sido aceptada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}

		//Si el estado es refused, muestra mensaje indicando que la petición ya había sido rechazada
		//Redrecciona al usuario
		if($petition -> status == 'refused'){
			Session::flash('message','La petición ya habia sido rechazada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}

		//Si el estado es finished, muestra mensaje indicando que la petición ya no es válida o ha sido terminada
		//Redirecciona al usuario
		if($petition -> status == 'finished'){
			Session::flash('message','La petición ya no es válida o ha sido terminada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
	}

}




