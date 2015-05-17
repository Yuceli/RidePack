<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Pack extends Eloquent {

	/*
	--------------------------
	| Model: Pack
	-------------------------
	| Mapeo de la tabla pack.
	|	
	*/

	use SoftDeletingTrait;

	//fecha de envío y de llegada de un paquete
	protected $dates = array('sending_date','arrival_date');

	//Relación con Petition
	public function requests()
	{
		return $this->morphMany('Petition', 'requestable');
	}

	//Relación con User
	public function user(){
		return $this->belongsTo('User');
	}

	//Relación con Trip
	public function trips(){
		return $this->belongsToMany('Trip')->withTimestamps();
	}

}