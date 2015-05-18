<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {
	/*
	--------------------------
	| Model: User
	-------------------------
	| Mapeo de la tabla user.
	|	
	*/

	use UserTrait, RemindableTrait,SoftDeletingTrait;

	/*
	total_rating es la suma total de todos los ratings que tiene el usuario.
	number_ratings es el numero de veces que el usuario se le ha asignado un rating.
	*/

	//Fecha de nacimiento del usuario
	protected $dates = array('birthdate');

	//Campos que deben ser llanados en el formulario del modelo user
	protected $fillable = ['email','password','name','last_name','city_id','total_rating','number_ratings'];

	//Campos ocultos o protegidos del modelo user
	protected $hidden = array('password', 'remember_token');

	//Relación con pack
	public function packs()
	{
		return $this->hasMany('Pack');
	}

	//Relación con trip
	public function trips()
	{
		return $this->hasMany('Trip');
	}
	
	//Relacion con rate
	public function rates(){
		return $this -> hasMany('Rate');
	}

	//id para autenticación
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	//Obtención contraseña
	public function getAuthPassword()
	{
		return $this->password;
	}

	//Relación con petition
	public function requests(){
    	return $this->hasMany('Petition','from_user');
    }

    //Obtener remeberToken
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	//Asignar rememberToken
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	//obtener tokenName
	public function getRememberTokenName()
	{
		return "remember_token";
	}

	//Email
	public function getReminderEmail()
	{
		return $this->email;
	}

	//Obtener el path de imágenes
	public function getImagesPath()
	{
		return 'img/user'. $this->id;
	}

	/*
	Getter que obtiene la suma de los ratings que se le han dado a un usuario.
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
	Función que calcula y devuelve el rating promedio de un usuario.
	*/
	public function Rating()
	{
		if($this->number_ratings==0){
		return $this->number_ratings;
		}
		$Rating=round($this->total_rating/$this->number_ratings);
		return $Rating;
	}

	public function getPacksMatchTrip($trip){

		$matchPacks = [];

		if($trip){
			$matchPacks = $this->packs()
				->where('from_city',	$trip->departure_city)
				->where('to_city',   	$trip->arrival_city)
				->where('sending_date',	$trip->departure_date->toDateString())
				->where('arrival_date',	$trip->arrival_date->toDateString())
				->get();
		}

		return $matchPacks;
	}
	
}
