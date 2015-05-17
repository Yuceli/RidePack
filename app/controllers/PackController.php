<?php 


class PackController extends BaseController {

	/*
	--------------------------------------------------------------------------
	|	Pack Controller
	--------------------------------------------------------------------------
	|  Controlador de paquetes
	|
	|	Rutas:
	|		Route::post('/post/package', 'PackController@createPack');
	|		Route::post('/delete/pack', 'PackController@DeletePack');
	|		Route::post('/edit/package/{id}', 'PackController@updatePack');
	|		Route::get('/post/package', 'PackController@showPostPack');
	|		Route::get('/edit/package/{id}', 'PackController@showUpdatePack');
	|		
	|	Métodos:
	|		createPack()
	|		deletePack()
	|		updatePack($id)
	|		showPostPack()
	|		showUpdatePack($id);
	|		showPostPackMatchTrip($tripID)
	|
	*/


 	// Crear un nuevo paquete.
	public function createPack()
	{
		// Reglas para validar el formulario para crear un paquete.
		$rules = array(
			'title' => 'max:60|required',
			'sending_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'reward' => 'numeric|min:0',
			'size' => 'required',
			'weight' => 'numeric|min:0|required',
			'observation' => 'max:100',
			'from_city' => 'required',
			'to_city' => 'required',
			'pack_picture'=>'image'
		);

		// Se validan los datos del formulario.
	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {	
	    	// Si los datos del formulario no cumplen las reglas, se muestran los errores al usuario.
	        return Redirect::back()->withErrors($validator)->withInput(Input::except('pack_picture'));
	    }

	    $pack = new Pack;

	    // Se asignan los datos del formulario al nuevo paquete.
	    $pack->title = Input::get('title');
	    $pack->sending_date = Input::get('sending_date');
	    $pack->arrival_date = Input::get('arrival_date');
	    $pack->reward = Input::get('reward');
	    $pack->size = Input::get('size');
	    $pack->weight = Input::get('weight');
	    $pack->observation = Input::get('observation');
	    $pack->status = 'onhold';
	    $pack->from_city = Input::get('from_city');
	    $pack->to_city = Input::get('to_city');

	    $user = Auth::user();

	    // Si se agregó una imagen, se valida y se guarda en el servidor
	    if( Input::hasFile('pack_picture') ){

	    	// Se obtiene la imagen agregada.
	    	$uploadedFile = Input::file('pack_picture');

	    	if( $uploadedFile->isValid() ){

	    		$destinantionPath = public_path($user->getImagesPath());

	    		// Si existe una imagen con el mismo nombre en el servidor, se notifica al usuario el error.
	    		if( File::exists($destinantionPath.'/'.$uploadedFile->getClientOriginalName()) ){

	    			return Redirect::back()->withErrors(array('pack_picture'=>'Ya existe una imagen con ese nombre.'))->withInput(Input::except('pack_picture'));
	    		}

	    		// Se guarda la imagen en el servidor.
				$uploadedFile->move($destinantionPath , $uploadedFile->getClientOriginalName());

				// Se guarda la ruta de la imagen en la base de datos.
				$pack->picture = $user->getImagesPath() .'/'. $uploadedFile->getClientOriginalName();
	    	}
	    }
	    
	    // Se guarda el nuevo paquete.
	    $user->packs()->save($pack);

	    // Se redirecciona a los detalles del paquete y se notifica al usuario que se ha publicado el paquete.
		return Redirect::to('package/details/'.$pack->id)->withMessage('Paquete publicado.')->withClass('success');
	}

	// Borrar un paquete
	public function deletePack()
	{
		// Se obtiene el paquete
		$pack=Pack::findorFail(Input::get('packid'));
		//Se obtienen las peticiones del paquete.
		$packPetitions = $pack->requests;
		//Se obtienen las peticiones asociadas al paquete.
		$linkedPetitions = Petition::where('pack_trip_id', $pack->id)->where('requestable_type','Trip')->get();
		//Se unen los dos resultados
		$petitions = $packPetitions->merge($linkedPetitions);
		//Se borran todas las peticiones asociadas al viaje.
		$petitions->each(function($petition){
			$petition->delete();
		});
		//Se borra el paquete
		$pack->delete();
		//Se redirecciona al usuario a la vista de gestión de paquetes
		return Redirect::to('/management')
			->withMessage('Se ha eliminado el paquete.')
			->withClass('success');
	}

	// Actualizar un paquete
	public function updatePack($id)
	{
		// Se busca el paquetes en los paquetes del usuario autenticado.
		$user = Auth::user();
		$pack = $user->packs()->find($id);

		// Si el paquete no pertence al usuario autenticado se devuelve un error 404.
		if(!$pack){
			App::abort(404);
		}

		// Reglas para validar el formulario para editar un paquete.
		$rules = array(
			'title' => 'max:60|required',
			'sending_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'reward' => 'numeric|min:0',
			'size' => 'required',
			'weight' => 'numeric|min:0|required',
			'observation' => 'max:100',
			'from_city' => 'required',
			'to_city' => 'required',
			'pack_picture'=>'image'
		);

		// Se validan los datos del formulario.
	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	    	// Si los datos del formulario no cumplen las reglas, se muestran los errores al usuario.
	        return Redirect::back()->withErrors($validator)->withInput(Input::except('pack_picture'));
	    }

	    // Se modifican los datos del paquete con los datos formulario.
	    $pack->title = Input::get('title');
	    $pack->sending_date = Input::get('sending_date');
	    $pack->arrival_date = Input::get('arrival_date');
	    $pack->reward = Input::get('reward');
	    $pack->size = Input::get('size');
	    $pack->weight = Input::get('weight');
	    $pack->observation = Input::get('observation');
	    $pack->from_city = Input::get('from_city');
	    $pack->to_city = Input::get('to_city');

	    
	    // Si se agregó una imagen, se valida y se guarda en el servidor
	    if( Input::hasFile('pack_picture') ){

	    	// Se obtiene la imagen agregada.
	    	$uploadedFile = Input::file('pack_picture');

	    	if( $uploadedFile->isValid() ){

	    		$destinantionPath = public_path($user->getImagesPath());

	    		// Si existe una imagen con el mismo nombre en el servidor, se notifica al usuario el error.
	    		if( File::exists($destinantionPath.'/'.$uploadedFile->getClientOriginalName()) ){

	    			return Redirect::back()->withErrors(array('pack_picture'=>'Ya existe una imagen con ese nombre.'))->withInput(Input::except('pack_picture'));
	    		}

	    		// Se guarda la imagen en el servidor.
				$uploadedFile->move($destinantionPath , $uploadedFile->getClientOriginalName());

				// Se guarda la ruta de la imagen en la base de datos.
				$pack->picture = $user->getImagesPath() .'/'. $uploadedFile->getClientOriginalName();
	    	}
	    }
	    
	    // Se guardan el paquete actualizado.
	    $pack->save();

	    // Se redirecciona a los detalles del paquete y se notifica al usuario que se ha modificado el paquete.
		return Redirect::to('package_details/'.$pack->id)->withMessage('Paquete modificado.')->withClass('success');
	}

	// Mostrar la vista para publicar un paquete.
	public function showPostPack(){
		
		return View::make('PostPack');
	}

	// Mostrar la vista para editar un paquete.
	public function showUpdatePack($id = 0){

		// Se busca el paquete a editar.
		$pack = Auth::user()->packs()->find($id);

		// Si el paquete no pertenece al usuario autenticado, se envia un error 404.
		if(!$pack){
			App::abort(404);
		}

		// Se crea la vista con los datos del paquete.
		return View::make('EditPack')->withPack($pack);
	}

	// Mostrar la vista para publicar un paquete de acuerdo a los datos de un viaje.
	public function showPostPackMatchTrip($tripID){
		//Busca el viaje de acuerdo al ID
		$trip = Trip::find($tripID);

		//Muestra la vista para publicar un paquete de acuerdo a los datos de un viaje
		Session::flash('_old_input', array(
			'from_city' => $trip->departure_city,
			'to_city' => $trip->arrival_city,
			'sending_date' => $trip->departure_date->toDateString(),
			'arrival_date' => $trip->arrival_date->toDateString(),
			'size' => $trip->max_size,
			'weight' => $trip->max_weight,
		));
		//Crea vista para publicar un paquete con los datos del viaje
		return View::make('PostPack');
	}

}
?>