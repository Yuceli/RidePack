<?php 


class ManagementController extends BaseController {

	/*
	--------------------------------------------------------------------------
	|	Management Controller
	--------------------------------------------------------------------------
	|  Controlador para el manejo de viajes y paquetes
	|
	|	Rutas:
	|		Route::get('/management', 'ManagementController@showManagement');
	|
	|	Métodos:
	|		showManagement()
	|		
	*/
	


	/*
	* Función para mostrar viajes y paquetes del usuario
	* cuando desea gestionarlos
	*/
	public function showManagement()
	{
		//Se hace una búsqueda de los paquetes del usuarios registrado
	    $packs = Auth::user() -> packs()-> paginate(5);
	    //Se hace una búsqueda de los viajes del usuario registrado
	    $trips = Auth::user() -> trips()-> paginate(5);
	    
		return View::make('Management', compact('packs'), compact('trips'));
	}
	
}

 ?>