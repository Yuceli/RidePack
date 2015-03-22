<?php 


class EditProfileController extends BaseController {


	public function showWelcome()
	{
		return View::make('edit-profile');
	}