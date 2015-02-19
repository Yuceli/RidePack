<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table){
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});

		Schema::table('packs', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->foreign('from_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
			$table->foreign('to_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});

		Schema::table('trips', function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->foreign('departure_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
			$table->foreign('arrival_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});

		Schema::table('pack_trip', function($table){
			$table->foreign('pack_id')->references('id')->on('packs')->onDelete('CASCADE')->onUpdate('CASCADE');
			$table->foreign('trip_id')->references('id')->on('trips')->onDelete('CASCADE')->onUpdate('CASCADE');
		});

		Schema::table('messages', function($table){
			$table->foreign('from_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
		});		

		/*Schema::table('comments', function($table){
			$table->foreign('from_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
		});	*/	
		
		Schema::table('requests', function($table){
			$table->foreign('from_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
		});	

		Schema::table('cities', function($table){
			$table->foreign('country_code')->references('code')->on('countries')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});	


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
