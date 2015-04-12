<?php 


class ManagementController extends BaseController {

	public function index()
	{
	    $packs = Auth::user() -> packs;
		return View::make('management', compact("packs"));
	}
}

 ?>