<?php 


class HandleRequestsController extends BaseController {


	public function showWelcome()
	{
		return View::make('handle_requests');
	}

	public function acceptRequest($id){
		$petition = Petition::findorFail($id);

		if($petition -> status == "onhold"){
			$petition -> status = "accepted";
			$petition -> save();
			Session::flash('message','La petición a sido aceptada');
			Session::flash('class', 'success');
			return Redirect::to('/handle/request');
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

	public function refuseRequest($id){
		$petition = Petition::findorFail($id);

		if($petition -> status == "onhold"){
			$petition -> status = "refused";
			$petition -> save();
			Session::flash('message','La petición a sido rechazada');
			Session::flash('class', 'success');
			return Redirect::to('/handle/request');
		}
		if($petition -> status == "refused"){
			Session::flash('message','La petición ya habia sido rechazada');
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




