<?php

class TripDetailsController extends BaseController {


	public function showWelcome()
	{
		return View::make('TripDetails');
	}
	
	public function showDetails($id){
		if (Auth::check()){
			$trip = Trip::find($id);
			$user_id = $trip -> user_id;
			$user = User::find($user_id);
			$trips = $user -> trips;
			return View::make('TripDetails', compact("trip", "user", "trips"));
		}
	}

	public function sendRequest($id)
	{
			$myPetitions = Petition::where('from_user', '=', Auth::id())->where('requestable_id', '=', $id)->get();
			if( sizeof($myPetitions->toArray())==0 )
			{
				$petition = new Petition;
				$petition->from_user = Auth::id();
				$petition->status = 'onhold';
				$trip = Trip::find($id);

				if($petition->save() && $trip->requests()->save($petition))
				{
					Session::flash('message','La petición a sido registrada');
					Session::flash('class', 'success');
					return Redirect::to('/management');
				}
				else
				{
					Session::flash('message', 'Ocurrió un error con la petición. Intente nuevamente');
					Session::flash('class', 'danger');
					return Redirect::back();
				}
			}
			else
			{
				Session::flash('message', 'Ya se postuló antes. No puede postularse más de una vez');
				Session::flash('class', 'danger');
				return Redirect::back();
			}
		
	}
}

?>