<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trips', function($table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned();

			$table->integer('departure_city')->unsigned();
			$table->integer('arrival_city')->unsigned();
			$table->date('departure_date');
			$table->date('arrival_date');
			$table->integer('max_volume')->unsigned();
			$table->integer('max_weight')->unsigned();
			$table->string('observation', 100)->nullable();
			$table->boolean('carry_reward')->default(false);
			$table->string('transport', 45);

			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->foreign('departure_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
			$table->foreign('arrival_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('trips');
	}

}
