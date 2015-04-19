<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Pack extends Eloquent {
	use SoftDeletingTrait;

	protected $dates = array('sending_date','arrival_date');

	public function requests()
	{
		return $this->morphMany('Petition', 'requestable');
	}

	public function comment()
	{
		return $this->morphMany('Comment', 'commentable');
	}

	public function user(){
		return $this->belongsTo('User');
	}

	public function trips(){
		return $this->belongsToMany('Trip')->withTimestamps();
	}

}