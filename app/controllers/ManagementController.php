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
		//Numero de elementos que se mostrarán por página
		$numberPerPage = 5;
		//Se hace una búsqueda de los paquetes del usuarios registrado
	    $packs = Auth::user() -> packs()-> paginate($numberPerPage);
	    //Se hace una búsqueda de los viajes del usuario registrado
	    $trips = Auth::user() -> trips()-> paginate($numberPerPage);
	    
		return View::make('Management', compact('packs'), compact('trips'));
	}
	
}

 ?>