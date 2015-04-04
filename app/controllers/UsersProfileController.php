<?php

class UsersProfileController extends BaseController {

	public function showUserProfile($user_id)
	{		//Muestra la página del perfil de otro usuario
			$user = User::findOrFail($user_id);
			return View::make('users-profile')->with('user',$user);;
		}

	}