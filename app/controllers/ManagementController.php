<?php 


class ManagementController extends BaseController {

	public function index()
	{
		$user_id = Auth::user() -> id;
	    $user = User::find($user_id);
	    $packs = $user -> packs;
	    
		return View::make('management', compact("packs"));
	}
}

 ?>