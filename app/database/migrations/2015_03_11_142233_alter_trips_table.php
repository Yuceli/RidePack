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
			$table->dropForeign('trips_departure_city_foreign');
			$table->dropForeign('trips_arrival_city_foreign');
			$table->dropColumn('departure_city');
			$table->dropColumn('arrival_city');
		});

		Schema::table('trips', function($table){
			$table->string('departure_city',100);
			$table->string('arrival_city',100);
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
			$table->dropColumn('departure_city');
			$table->dropColumn('arrival_city');
		});

		Schema::table('trips', function($table){
			$table->integer('departure_city')->unsigned();
			$table->integer('arrival_city')->unsigned();
			$table->foreign('departure_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
			$table->foreign('arrival_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});
	}

}
