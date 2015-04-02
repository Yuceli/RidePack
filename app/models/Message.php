<?php

class Message extends Eloquent {

	protected $fillable = ['from_user','content','status'];

	public function messageable()
    {
        return $this->morphTo();
    }

    public function fromUser(){
    	return $this->belongsTo('User','from_user');
    }
}

?>