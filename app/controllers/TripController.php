<?php 


class TripController extends BaseController {

	//Función para crear un nuevo paquete
	public function createTrip()
	{
		//Reglas para validar los campos del nuevo paquete
		$rules = array(
			'transport' => 'required',
			'max_size' => 'required',
			'max_weight' => 'numeric|min:1|max:15|required',
			'carry_reward' => 'numeric|min:0',
			'departure_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'arrival_city' => 'required',
			'departure_city' => 'required',
			'observation' => 'max:100'
		);
		//Valida los campos con las reglas dadas.
	    $validator = Validator::make(Input::all(), $rules);

	    //Prueba que no falle la validación, en caso de que falle se redirecciona con errores y se devuelven los campos
	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::all());
	    }

	    //Si no fallan las validaciones, se crea un nuevo viaje
	    $trip = new Trip;

	    //Se asignan los datos del formulario al nuevo paquete
	    $trip->departure_date = Input::get('departure_date');
	    $trip->arrival_date = Input::get('arrival_date');
	    $trip->max_size = Input::get('max_size');
	    $trip->max_weight = Input::get('max_weight');
	    $trip->observation = Input::get('observation');
	    $trip->carry_reward = Input::get('carry_reward');
	    $trip->transport = Input::get('transport');
	    $trip->departure_city = Input::get('departure_city');
	    $trip->arrival_city = Input::get('arrival_city');
	    
	    //Se guarda el paquete
	    Auth::user()->trips()->save($trip);
	    //Redirecciona al usuario a los detalles del viaje con mensaje de éxito
		return Redirect::to('trip/details/'.$trip->id)->withMessage('Viaje creado exitosamente.')->withClass('success');
	}

	//Función para borrar un viaje
	public function deleteTrip()
	{
		//Se obtiene el id del viaje
		$trip=Trip::findorFail(Input::get('tripid'));
		//Se borra
		$trip->delete();
		//Se redirecciona al usuario a la vista de gestión de viajes
		return Redirect::to('/management');
	}

	//Función para actualizar un viaje
	public function updateTrip($id){
		//Se busca el viaje entre los paquetes del usuario registrado
		$user = Auth::user();
		$trip = $user->trips()->find($id);

		//Si no existe el viaje se muestra error
		if(!$trip){
			App::abort(404);
		}

		//Reglas para validar el formulario
		$rules = array(
			'travel' => 'required',
			'max_weight' => 'numeric|min:1|max:15|required',
			'carry_reward' => 'min:0',
			'departure_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'arrival_city' => 'required',
			'departure_city' => 'required',
			'observation' => 'max:100',
			'max_size' => 'required'

		);
	    
	    //Se valdiadn los datos del formulario
	    $validator = Validator::make(Input::all(), $rules);

	    //Si falla la validación se muestran al usuario.
	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::all());
	    }

	    //Se obtienen los nuevos campos del formulario
	    $trip->departure_date = Input::get('departure_date');
	    $trip->arrival_date = Input::get('arrival_date');
	    $trip->max_weight = Input::get('max_weight');
	    $trip->observation = Input::get('observation');
	    $trip->carry_reward = Input::get('carry_reward');
	    $trip->transport = Input::get('travel');
	    $trip->departure_city = Input::get('departure_city');
	    $trip->arrival_city = Input::get('arrival_city');
  	    $trip->max_size = Input::get('max_size');


	    //Se guardan los datos modificados
	    $trip->save();

	    //Se redirecciona al usuario a los detalles del paquete, se muestra mensaje que el viaje ha sido modificado
		return Redirect::to('trip/details/'.$trip->id)->withMessage('Viaje modificado.')->withClass('success');

	}

	//Función para obtener viajes
	public function getTrip($id)
	{
		
	}

	//Mostrar la vista para editar un viaje
	public function showUpdateTrip($id = 0){
		//Se busca el viaje a editar
		$trip = Auth::user()->trips()->find($id);
		//Si el viaje no pertence al usuario autenticado, se envia error 404.
		if(!$trip){
			App::abort(404);
		}
		//Se crea la vista con los datos del viaje
		return View::make('EditTrip')->withTrip($trip);
		
	}

	// Mostrar la vista para publicar un viaje.
	public function showPostTrip(){
		
		return View::make('PostTrip');
	}

 }
 ?>