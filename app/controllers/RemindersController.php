<?php

class RemindersController extends BaseController {

	public function request()
	{
		if ($this->isPostRequest()){
			$response = $this->getPasswordRemindResponse();

			if($this->isInvalidUser($response)){
				return Redirect::back()
					->withInput()
					->with("error", Lang::get($response));
			}

			return Redirect::back()
				->with("status", Lang::get($response));
		}
		return View::make("user/request");
	}

	public function reset($token)
	{
		if ($this->isPostRequest()){
			$credentials = Input::only(
				"email",
				"password",
				"password_confirmation"
			) + compact("token");

			$response = $this->resetPassword($credentials);

			if($response === Password::PASSWORD_RESET) {
				return Redirect::action("LoginController@showWelcome");
			}

			return Redirect::back()
				->withInput()
				->with("error", Lang::get($response));
		}
		return View::make("user/reset", compact("token"));
	}

	protected function getPasswordRemindResponse()
	{
		return Password::remind(Input::only("email"));
	}

	protected function isInvalidUser($response)
	{
		return $response === Password::INVALID_USER;
	}

	protected function resetPassword($credentials)
	{
		return Password::reset($credentials, function($user, $pass) {
			$user->password = Hash::make($pass);
			$user->save();
		});
	}

	protected function isPostRequest()
	{
		return Input::server("REQUEST_METHOD") == "POST";
	}
}