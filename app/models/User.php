<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,SoftDeletingTrait;

	protected $fillable = ['email','password','name','last_name','city_id'];

	protected $hidden = array('password', 'remember_token');

	public function packs()
	{
		return $this->hasMany('Pack');
	}

	public function trips()
	{
		return $this->hasMany('Trip');
	}

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return "remember_token";
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getImagesPath()
	{
		return 'img/user'. $this->id;
	}
}
