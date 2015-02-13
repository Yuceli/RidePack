<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();

			$table->string('email', 60)->unique();
			$table->string('password', 100);
			$table->string('name', 30);
			$table->string('last_name', 30);
			$table->string('phone', 30)->nullable();
			$table->date('birthdate')->nullable();
			$table->integer('city_id')->unsigned();

			$table->foreign('city_id')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
