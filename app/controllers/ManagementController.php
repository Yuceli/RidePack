<?php 


class ManagementController extends BaseController {

	/*
	* Función para mostrar viajes y paquetes del usuario
	* cuando desea gestionarlos
	*/
	public function showManagement()
	{
		$numberPerPage = 5;
	    $packs = Auth::user() -> packs()-> paginate($numberPerPage);
	    $trips = Auth::user() -> trips()-> paginate($numberPerPage);
		return View::make('Management', compact('packs'), compact('trips'));
	}
	
}

 ?>