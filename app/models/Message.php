<?php

	class Message extends Eloquent {

		public function messageable()
	    {
	        return $this->morphTo();
	    }

	    public function fromUser(){
	    	return $this->belongsTo('User','from_user');
	    }
	}