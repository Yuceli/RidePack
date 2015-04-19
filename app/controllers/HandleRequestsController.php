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
	}




