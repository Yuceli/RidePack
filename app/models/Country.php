<?php

	class Country extends Eloquent {
		
		public function cities()
		{
			return $this->hasMany('City','country_code','code');
		}
	}