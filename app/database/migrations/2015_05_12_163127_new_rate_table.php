<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rates', function($table)
		{
			$table->integer('id_user_rated')->unsigned();
			$table->integer('from_user')->unsigned();
			$table->enum('rate', array('1','2','3','4','5'));
			$table->timestamps();
			$table->primary(array('id_user_rated', 'from_user'));

			$table->foreign('id_user_rated')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('CASCADE');
			$table->foreign('from_user')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('CASCADE');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('rates');
	}

}
