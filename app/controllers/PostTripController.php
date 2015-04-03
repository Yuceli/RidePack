<?php 


class PostTripController extends BaseController {


	public function createTrip()
	{
		$rules = array(
			'travel' => 'required',
			'package' => 'required',
			'quantity' => 'numeric|min:1|max:15|required',
			'volume' => 'required',
			'reward' => 'required',
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

		return Redirect::to('detailsTrip/')->withMessage('Viaje publicado.');
	}

	public function deleteTrip($id)
	{
		
	}

	public function updateTrip($id)
	{
		
	}

	public function getTrip($id)
	{
		
	}


 }
 ?>