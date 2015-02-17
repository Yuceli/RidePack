<?php

class UsersController extends \BaseController{

	public function index(){
		$users= User::all();
		return $users;

	}
}