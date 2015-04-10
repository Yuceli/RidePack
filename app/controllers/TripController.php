<?php 


class TripController extends BaseController {


	public function createTrip()
	{
		$rules = array(
			'travel' => 'required',
			'package' => 'required',
			'quantity' => 'numeric|min:1|max:15|required',
			'volume' => 'required',
			'reward' => 'required|min:0',
			'from_city' => 'required',
			'to_city' => 'required',
			'departure_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'observation' => 'max:100'
		);

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::all());
	    }

	    $trip = new Trip;

	    $trip->departure_date = Input::get('departure_date');
	    $trip->arrival_date = Input::get('arrival_date');
	    $trip->max_volume = Input::get('volume');
	    $trip->max_weight = Input::get('quantity');
	    $trip->observation = Input::get('observation');
	    $trip->carry_reward = Input::get('reward');
	    $trip->transport = Input::get('travel');
	    $trip->departure_city = Input::get('from_city');
	    $trip->arrival_city = Input::get('to_city');
	    
	    Auth::user()->trips()->save($trip);

		return Redirect::to('trip_details/')->withMessage('Viaje publicado.');
	}

	public function deleteTrip($id)
	{
		
	}

	public function updateTrip($id){
		
		$user = Auth::user();
		$trip = $user->trips()->find($id);


		if(!$trip){
			App::abort(404);
		}

		$rules = array(
			'travel' => 'required',
			'package' => 'required',
			'quantity' => 'numeric|min:1|max:15|required',
			'volume' => 'required',
			'reward' => 'required|min:0',
			'from_city' => 'required',
			'to_city' => 'required',
			'departure_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'observation' => 'max:100'
		);
	    
	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::all());
	    }


	    $trip->departure_date = Input::get('departure_date');
	    $trip->arrival_date = Input::get('arrival_date');
	    $trip->max_volume = Input::get('volume');
	    $trip->max_weight = Input::get('quantity');
	    $trip->observation = Input::get('observation');
	    $trip->carry_reward = Input::get('reward');
	    $trip->transport = Input::get('travel');
	    $trip->departure_city = Input::get('from_city');
	    $trip->arrival_city = Input::get('to_city');


	    $trip->save();

		return Redirect::to('trip_details/')->withMessage('Viaje modificado.');


	}

	public function getTrip($id)
	{
		
	}


	public function showUpdateTrip($id = 0){
		$trip = Auth::user()->trips()->find($id);

		if(!$trip){
			App::abort(404);
		}

		return View::make('edit_travel')->withTrip($trip);
		
	}


 }
 ?>