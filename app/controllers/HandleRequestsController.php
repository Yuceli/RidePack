<?php 


class HandleRequestsController extends BaseController {


	public function showWelcome()
	{
		$user = Auth::user();
		$userid=$user->id;
		$requests= DB::table('requests')
            ->where('requestable_id', '=', $userid)
            ->get();
		return View::make('handle_requests')->with('requests', $requests);
	}

	public function acceptRequest($id){
		$petition = Petition::findorFail($id);

		if($petition -> status == "onhold"){
			$petition -> status = "accepted";
			$petition -> save();
			Session::flash('message','La petición a sido aceptada');
			Session::flash('class', 'success');
			return Redirect::to('/management');
		}
		if($petition -> status == "accepted"){
			Session::flash('message','La petición ya habia sido aceptada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		if($petition -> status == "finished"){
			Session::flash('message','La petición ya no es válida o ha sido terminada');
			Session::flash('class', 'danger');
			return Redirect::back();
		}
		


	}
}




