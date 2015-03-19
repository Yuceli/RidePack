<?php 


class ProfileController extends BaseController {


	public function showWelcome()
	{
		return View::make('profile');
	}