<?php

class UsersProfileController extends BaseController {

	public function showUserProfile()
	{		//Muestra la página del perfil de otro usuario
			$user_id = 3;
			$user = User::find($user_id);
			return View::make('users-profile')->with('user',$user);;
		}
	}