<?php

class PackDetailsController extends BaseController {

	//Esta función crea la vista PackDetails sin mandar ningun dato para que funcione.
	public function showWelcome()
	{
		return View::make('PackDetails');
	}

	//Esta función crea la vista PackDetails, recibiendo un id y mandando los detalles del paquete, el usuario y los viajes.
	public function showPackDetails($id){
		//Checa si el usuario ha sido autenticado.
		if (Auth::check()){
			//Busca el paquete por el id por el parametro recibido.
			$pack = Pack::find($id);
			//Recpera id del usuario que es dueño del paquete.
			$user_id = $pack -> user_id;
			//Busca al usuario dueño del paquete.
			$user = User::find($user_id);
			//Recibe los viajes del dueño del paquete.
			$trips = $user -> trips;
			//Crea la vista que muestra los detalles del paquete, pasando los datos del paquete, usuario y viajes.
			return View::make('PackDetails', compact("pack", "user", "trips"));
		}
	}

	//Esta función recibe un id y envia una petición a la base de datos.
	public function sendRequest($id)
	{
			/*Esta es la petición a la base de datos, donde se pide todas las peticiones relacionadas con el usuario autenticado
			y el creaddor de la petición tenga un id igual al recibido.*/
			$myPetitions = Petition::where('from_user', '=', Auth::id())->where('requestable_id', '=', $id)->get();
			//Este if busca discriminar si la petición es valida, es decir si ya sea ha postulado antes.
			if( sizeof($myPetitions->toArray())==0 )
			{	
				//Se crea una nueva petición
				$petition = new Petition;
				//Se buscan todas las peticiones ligadas al usuario autenticado.
				$petition->from_user = Auth::id();
				//Se agrega que las peticiones deben tener como status "onhold".
				$petition->status = 'onhold';
				//Se pide que se encuentren los paquetes iguales al id.
				$pack = Pack::find($id);
				//Este if ocurre si la petición se ha guardado correctamente y redirige a la vista management.
				if($petition->save() && $pack->requests()->save($petition))
				{
					Session::flash('message','La petición a sido registrada');
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