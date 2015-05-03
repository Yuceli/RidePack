<?php 


class ManagementController extends BaseController {

	/*
	* Función para mostrar viajes y paquetes del usuario
	* cuando desea gestionarlos
	*/
	public function showManagement()
	{
	    $packs = Auth::user() -> packs()-> paginate(5);
	    $trips = Auth::user() -> trips()-> paginate(5);
		return View::make('Management', compact("packs"), compact("trips"));
	}
	
}

 ?>