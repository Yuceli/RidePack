<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function($table)
		{
			$table->increments('id');
			$table->string('country_code', 2);
			$table->string('name', 100);

			//$table->foreign('country_code')->references('code')->on('countries')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
