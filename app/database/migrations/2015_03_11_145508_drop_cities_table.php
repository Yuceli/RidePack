<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('cities');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('cities', function($table)
		{
			$table->increments('id');
			$table->string('country_code', 2);
			$table->string('name', 100);

			$table->foreign('country_code')->references('code')->on('countries')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});
	}

}
