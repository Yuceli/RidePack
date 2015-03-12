<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Pack extends Eloquent {
	use SoftDeletingTrait;

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

	public function user(){
		return $this->belongsTo('User');
	}

	public function trips(){
		return $this->belongsToMany('Trip')->withTimestamps();
	}

}