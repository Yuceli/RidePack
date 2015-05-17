<?php

	class Petition extends Eloquent {

		/*
		--------------------------
		| Model: Petition
		-------------------------
		| Mapeo de la tabla requests.
		| Peticiones
		|	
		*/
		
		protected $table = 'requests';
		

		public function requestable()
	    {
	        return $this->morphTo();
	    }

	    //Relación con user
	    public function fromUser(){
	    	return $this->belongsTo('User','from_user');
	    }

	    //Relación con pack
	    public function pack(){

	    	if ($this->requestable_type == 'Trip') {

	    		return $this->belongsTo('Pack','pack_trip_id');
	    	}
	    	else{
	    		return null;
	    	}
	    	
	    }

	    //Relación con trip
	    public function trip(){

	    	if ($this->requestable_type == 'Pack') {

	    		return $this->belongsTo('Trip','pack_trip_id');
	    	}
	    	else{
	    		return null;
	    	}
	    }
	}