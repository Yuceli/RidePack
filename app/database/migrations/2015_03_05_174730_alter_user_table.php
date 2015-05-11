<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->dropForeign('users_city_id_foreign');
			$table->dropColumn('city_id');
		});

		Schema::table('users', function($table){
			$table->string('city_id',100)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table){
			$table->dropColumn('city_id');
		});

		Schema::table('users', function($table){
			$table->integer('city_id')->unsigned()->nullable();
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});
	}

}
