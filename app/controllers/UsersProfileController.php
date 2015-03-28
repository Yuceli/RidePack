<?php

class UsersProfileController extends BaseController {

	public function showWelcome()
	{
		return View::make('users-profile');
	}

}