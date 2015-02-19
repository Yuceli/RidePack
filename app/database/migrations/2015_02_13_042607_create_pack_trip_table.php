<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackTripTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pack_trip', function($table)
		{
			$table->integer('pack_id')->unsigned();
			$table->integer('trip_id')->unsigned();

			$table->timestamps();
			$table->primary(array('pack_id', 'trip_id'));
			//$table->foreign('pack_id')->references('id')->on('packs')->onDelete('CASCADE')->onUpdate('CASCADE');
			//$table->foreign('trip_id')->references('id')->on('trips')->onDelete('CASCADE')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('pack_trip');
	}

}
