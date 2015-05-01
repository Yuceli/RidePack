<?php 


class ManagementController extends BaseController {

	public function index()
	{
	    $packs = Auth::user() -> packs()-> paginate(5);
	    $trips = Auth::user() -> trips()-> paginate(5);
/*	    $items = $this->getInfoTrips();
	    $total = count($items);
	    $perPage = 5;
	    $myTrips = Paginator::make($items, $total, $perPage);*/
		return View::make('management', compact("packs"), compact("trips"));
	}

	private function getInfoTrips()
	{
		$trips = Auth::user()->trips;
		$infoTrips = array();
		foreach ($trips as $trip){
			$created = explode(" ", $trip->created_at);
			$created = $created[0];
			$created = explode("-", $created);
			$created = $created[2]."/".$created[1]."/".substr($created[0], 2);

			$departure_date = explode(" ", $trip -> departure_date);
			$departure_date = $departure_date[0];
			$departure_date = explode("-", $departure_date);
			$departure_date = $departure_date[2]."/".$departure_date[1]."/".substr($departure_date[0], 2);

			$arrival_date = explode(" ", $trip -> arrival_date);
			$arrival_date = $arrival_date[0];
			$arrival_date = explode("-", $arrival_date);
			$arrival_date = $arrival_date[2]."/".$arrival_date[1]."/".substr($arrival_date[0], 2);

			//$transports = array('Vía terrestre' => 'Terrestre', 'Vía áerea' => 'Áerea', 'Vía marítima' => 'Maritima');
			$transports = array("Terrestre", "Áerea", "Marítima");
			$transport = $transports[$trip -> transport];

			$infoTrip = array(
				"id" => $trip -> id,
				"created_at" => $created,
				"departure_city" => $trip -> departure_city,
				"departure_date" => $departure_date, 
				"arrival_city" => $trip -> arrival_city,
				"arrival_date" => $arrival_date,
				"max_size" => $trip -> max_size,
				"max_weight" => $trip -> max_weight,
				"transport" => $transport,
				"carry_reward" => $trip -> carry_reward
			);
			array_push($infoTrips, $infoTrip);
		}
		return $infoTrips;
	}
}

 ?>