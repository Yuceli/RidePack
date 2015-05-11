<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Trip extends Eloquent {
	use SoftDeletingTrait;

	protected $dates = array('departure_date','arrival_date');

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function requests()
	{
		return $this->morphMany('Petition', 'requestable');
	}

	public function packs(){
		return $this->belongsToMany('Pack')->withTimestamps();
	}
}