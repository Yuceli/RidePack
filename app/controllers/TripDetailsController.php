<?php

class TripDetailsController extends BaseController {


	public function showWelcome()
	{
		return View::make('trip_details');
	}
	
	public function showDetails($id){
		if (Auth::check()){
			$trip = Trip::find($id);
			$user_id = $trip -> user_id;
			$user = User::find($user_id);
			$trips = $user -> trips;
			return View::make('trip_details', compact("trip", "user", "trips"));
		}
	}
}

?>