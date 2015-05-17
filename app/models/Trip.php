<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Trip extends Eloquent {
	/*
	--------------------------
	| Model: Trip
	-------------------------
	| Mapeo de la tabla trip.
	|	
	*/
	use SoftDeletingTrait;

	//Fechas de salida y llegada
	protected $dates = array('departure_date','arrival_date');

	//Relación con user
	public function user()
	{
		return $this->belongsTo('User');
	}

	//Relación con petition
	public function requests()
	{
		return $this->morphMany('Petition', 'requestable');
	}

	//Relación con pack
	public function packs(){
		return $this->belongsToMany('Pack')->withTimestamps();
	}
}