<?php 


class EditProfileController extends BaseController {

	function updateUser(){
		$rules = array(
			'name' => 'max:30|required',
			'last_name' => 'max:30|required',
			'birthdate' => 'date|date_format:Y-m-d',
			'email' => 'max:60|email|unique:users,email,'.Auth::user()->id.'|required',
			'password' => 'min:6|max:30|confirmed'
		);

	    $validator = Validator::make(Input::only('name','last_name','birthdate','email','password','password_confirmation'), $rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::except('password','password_confirmation'));
	    }

	    $user = Auth::user();

	    $user->name = Input::get('name');
	    $user->last_name = Input::get('last_name');
	    $user->birthdate = Input::get('birthdate');
	    $user->email = Input::get('email');
	    $user->phone = Input::get('phone');
	    $user->city_id = Input::get('city_id');

	    if(Input::get('password')){
	    	$user->password = Hash::make(Input::get('password'));
	    }

	    $user->save();

		return Redirect::to('profile');
	}

	function deleteUser(){
		$user = User::find(Auth::user()->id);

		Auth::logout();

		if ($user->delete()) {

        	return Redirect::to('/')->with('msg', 'Tu cuenta ha sido eliminada.');
    	}
	}

}