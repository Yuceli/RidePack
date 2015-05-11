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

	    public function pack(){

	    	if ($this->requestable_type == 'Trip') {

	    		return $this->belongsTo('Pack','pack_trip_id');
	    	}
	    	else{
	    		return null;
	    	}
	    	
	    }

	    public function trip(){

	    	if ($this->requestable_type == 'Pack') {

	    		return $this->belongsTo('Trip','pack_trip_id');
	    	}
	    	else{
	    		return null;
	    	}
	    }
	}