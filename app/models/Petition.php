<?php

	class Petition extends Eloquent {
		protected $table = 'requests';
		
		public function requestable()
	    {
	        return $this->morphTo();
	    }

	    public function fromUser(){
	    	return $this->belongsTo('User','from_user');
	    }
	}