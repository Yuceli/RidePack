<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearSuppliers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliersBD', function($tabla){
			$tabla -> increments('id');
			$tabla -> string('suppliername', 50);
			$tabla -> string('store', 50);
			$tabla -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	Schema::drop('suppliersBD');	
	}

}
