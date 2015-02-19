<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requests', function($table)
		{
			$table->increments('id');
			$table->integer('from_user')->unsigned();
			$table->enum('status', array('onhold','accepted','refused'));
			$table->morphs('requestable');

			$table->timestamps();
			//$table->foreign('from_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('requests');
	}

}
