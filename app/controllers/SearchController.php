<?php 


class SearchController extends BaseController {

	public function search()
	{
		$rules = array(
			'send_package' => 'required|min:0|max:1',
			'sending_date' => 'date|date_format:Y-m-d|required',
			'from_city' => 'required',
			'to_city' => 'required'
		);

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::all());
	    }

	    
	    $fromCity = Input::get('from_city');
	    $toCity = Input::get('to_city');
	    $sendingDate = Input::get('sending_date');

	    $trips = null;
	    $packs = null;
	    
	    if(Input::get('send_package')){
	    	$trips = Trip::where('departure_city', '=', $fromCity)
					->where('arrival_city', '=', $toCity)
					->where('departure_date', '=', $sendingDate)
					->paginate(5);

			//return View::make('search')->withTrips($trips)->withInput(Input::all());
	    }
	    else {
	    	$packs = Pack::where('from_city', '=', $fromCity)
					->where('to_city', '=', $toCity)
					->where('sending_date', '=', $sendingDate)
					->paginate(5);

			//return View::make('search')->withPacks($packs)->withInput(Input::all());
	    }

	    return View::make('search', compact('packs','trips'))->withInput(Input::all());
	}

	public function upcomingPackages(){

		$packs = Pack::orderBy('created_at','DESC')->paginate(5);


		return View::make('upcoming_packages', compact('packs'));
	}

	public function upcomingTrips(){

		$trips = Trip::orderBy('created_at','DESC')->paginate(5);

		return View::make('upcoming_trips', compact('trips'));
	}

	public function index(){
		$trips = null;
	    $packs = null;
		return View::make('search', compact('packs','trips'));
	}

}

?>