<?php

class PackDetailsController extends BaseController {


	public function showWelcome()
	{
		return View::make('package_details');
	}

	public function showPackDetails($id){
		if (Auth::check()){
			$pack = Pack::find($id);
			$user_id = $pack -> user_id;
			$user = User::find($user_id);
			$trips = $user -> trips;
			return View::make('package_details', compact("pack", "user", "trips"));
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
				$pack = Pack::find($id);

				if($petition->save() && $pack->requests()->save($petition))
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