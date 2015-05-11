<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('packs', function($table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned();

			$table->string('title', 60);
			$table->integer('from_city')->unsigned();
			$table->integer('to_city')->unsigned();
			$table->date('sending_date');
			$table->date('arrival_date');
			$table->decimal('reward', 7, 2)->default(0);
			$table->integer('volume')->unsigned();
			$table->integer('weight')->unsigned();
			$table->string('observation', 100)->nullable();
			$table->enum('status', array('onhold','sending','arrived'));
			
			//$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
			//$table->foreign('from_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
			//$table->foreign('to_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('packs');
	}

}
