<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,SoftDeletingTrait;

	/*
	total_rating es la suma total de todos los ratings que tiene el usuario.
	number_ratings es el numero de veces que el usuario se le ha asignado un rating.
	*/
	protected $fillable = ['email','password','name','last_name','city_id','total_rating','number_ratings'];

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

	/*
	Getter que obtiene la suma de los ratings que se le han dado a unusuario.
	*/
	public function getTotalRating()
	{
		return $this->total_rating;
	}

	/*
	Getter que obtiene la suma de todas las veces que el usuario ha recibido un rating.
	*/
	public function getNumberRating()
	{
		return $this->number_ratings;
	}

	/*
	Funciónque calcula y devuelve el rating promedio de un usuario.
	*/
		public function Rating()
	{
		if($this->number_ratings==0){
		return $this->number_ratings;
		}
		$Rating=round($this->total_rating/$this->number_ratings);
		return $Rating;
	}
}
