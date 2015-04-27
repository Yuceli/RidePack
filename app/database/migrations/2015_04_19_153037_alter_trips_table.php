<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trips', function($table){
			$table->dropColumn('max_volume');
		});

		Schema::table('trips', function($table){
			$table->string('max_size',14);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trips', function($table){
			$table->dropColumn('max_size');
		});

		Schema::table('trips', function($table){
			$table->integer('max_volume')->unsigned();
		});
	}

}
