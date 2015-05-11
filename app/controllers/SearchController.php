<?php 


class SearchController extends BaseController {

	/*
	--------------------------------------------------------------------------
	|	Search Controller
	--------------------------------------------------------------------------
	|  Controlador para la búsqueda de paquetes/viajes y mostrar últimos paquetes/viajes
	|
	|	Rutas:
	|		Route::post('/search', 'SearchController@search');
	|		Route::get('/upcoming/packages', 'SearchController@showLastPacks');
	|		Route::get('/upcoming/trips', 'SearchController@showLastTrips');
    
	|		
	|	Métodos:
	|		search()
	|		showLastPacks()
	|		showLastTrips()
	|
	*/

	/*
	 * Función para buscar paquetes o viajes de acuerdo a
	 * su fecha de envío, lugar de origen y lugar de destino.
	 */
	public function search()
	{
		// Reglas para la validación de datos del formulario.
		$rules = array(
			'send_package' => 'required|min:0|max:1',
			'sending_date' => 'date|date_format:Y-m-d|required',
			'from_city' => 'required',
			'to_city' => 'required'
		);

		// Validación de los datos del formulario.
	    $validator = Validator::make(Input::all(), $rules);

	    // Si la validación falla se regresa al formulario de búsqueda con los errores.
	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::all());
	    }

	 	// Se obtienen los datos del formulario.
	    $fromCity = Input::get('from_city');
	    $toCity = Input::get('to_city');
	    $sendingDate = Input::get('sending_date');

	    $trips = null;
	    $packs = null;
	    
	    // Si se quiere enviar un paquete, se realiza la búsqueda de viajes.
	    if(Input::get('send_package')){
	    	$trips = Trip::where('departure_city', '=', $fromCity)
					->where('arrival_city', '=', $toCity)
					->where('departure_date', '=', $sendingDate)
					->paginate(5);

	    }
	    // Sino se realiza la búsqueda de paquetes.
	    else {
	    	$packs = Pack::where('from_city', '=', $fromCity)
					->where('to_city', '=', $toCity)
					->where('sending_date', '=', $sendingDate)
					->paginate(5);

	    }

	    // Se devuelven los resultados de la búsqueda a la vista.
	    return View::make('Search', compact('packs','trips'))->withInput(Input::all());
	}

	/*
	 * Función para mostrar los últimos paquetes que se han publicado.
	 */
	public function showLastPacks(){

		// Se obtienen los paquetes en páginas de 5 y en orden descendente de acuerdo a su fecha de creación.
		$packs = Pack::orderBy('created_at','DESC')->paginate(5);

		return View::make('LastPacks', compact('packs'));
	}

	/*
	 * Función para mostrar los últimos viajes que se han publicado.
	 */
	public function showLastTrips(){

		// Se obtienen los viajes en páginas de 5 y en orden descendente de acuerdo a su fecha de creación.
		$trips = Trip::orderBy('created_at','DESC')->paginate(5);

		return View::make('LastTrips', compact('trips'));
	}

}

?>