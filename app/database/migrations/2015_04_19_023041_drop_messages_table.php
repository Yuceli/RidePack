<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('messages');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('messages', function($table)
		{
			$table->increments('id');
			$table->integer('from_user')->unsigned();
			$table->string('content', 200);
			$table->enum('status', array('onhold','sent','received'));
			$table->morphs('messageable');

			$table->timestamps();
		});
	}

}
