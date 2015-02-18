<?php
class PostTableSeeder extends Seeder{
	public function run(){
		Post::create(array('title'=>'Creador de Facebook llamo a Obamapor el espionaje de NSA',
			'content'=>'MarkZuckerber hablócon el presidente de EE.UU para'
			));
		Post::create(array('title'=>'Google rediseña la busqueda desde commputadoras',
			'content'=>'Se implementaron algunos cambios'
			));
		Post::create(array('title'=>'Se filtran fotos yrevelan detalles del nuevo',
			'content'=>'El teléfono será presentado el 25 de marzo'
			));

	}
}
