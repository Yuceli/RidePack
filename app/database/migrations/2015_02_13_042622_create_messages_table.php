<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function($table)
		{
			$table->increments('id');
			$table->integer('from_user')->unsigned();
			$table->string('content', 200);
			$table->enum('status', array('onhold','sent','received'));
			$table->morphs('messageable');

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
		Schema::dropIfExists('messages');
	}

}
