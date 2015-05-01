<?php 


class ManagementController extends BaseController {

	public function index()
	{
	    $packs = Auth::user() -> packs()-> paginate(5);
	    $trips = Auth::user() -> trips()-> paginate(5);
		return View::make('management', compact("packs"), compact("trips"));
	}
	
}

 ?>