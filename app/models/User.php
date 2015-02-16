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

	public function city()
	{
		return $this->belongsTo('City');
	}
}
