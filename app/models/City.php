<?php

	class City extends Eloquent {
		
		public function country(){
			return $this->belongsTo('Country','country_code','code');
		}
	}