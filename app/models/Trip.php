<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Trip extends Eloquent {
	use SoftDeletingTrait;

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function messages()
	{
		return $this->morphMany('Message', 'messageable');
	}

	public function requests()
	{
		return $this->morphMany('Petition', 'requestable');
	}

	public function comment()
	{
		return $this->morphMany('Comment', 'commentable');
	}

	public function packs(){
		return $this->belongsToMany('Pack')->withTimestamps();
	}

	public function departureCity(){
		return $this->belongsTo('City','departure_city');
	}

	public function arrivalCity(){
		return $this->belongsTo('City','arrival_city');
	}
}