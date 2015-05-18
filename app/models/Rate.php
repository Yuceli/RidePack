<?php

	class Rate extends Eloquent {

		/*
		--------------------------
		| Model: Rate
		-------------------------
		| Mapeo de la tabla rates.
		| Calificaciones
		|	
		*/
		
		protected $table = 'rates';

	    //Relación con user
	    public function userRated(){
	    	return $this->belongsTo('User','id_user_rated');
	    }
	}
?>