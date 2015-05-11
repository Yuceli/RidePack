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
		Schema::table('users', function($table){
			$table->dropForeign('users_city_id_foreign');
		});

		Schema::table('packs', function($table){
			$table->dropForeign('packs_user_id_foreign');
			$table->dropForeign('packs_from_city_foreign');
			$table->dropForeign('packs_to_city_foreign');
		});

		Schema::table('trips', function($table){
			$table->dropForeign('trips_user_id_foreign');
			$table->dropForeign('trips_departure_city_foreign');
			$table->dropForeign('trips_arrival_city_foreign');
		});

		Schema::table('pack_trip', function($table){
			$table->dropForeign('pack_trip_pack_id_foreign');
			$table->dropForeign('pack_trip_trip_id_foreign');
		});

		Schema::table('messages', function($table){
			$table->dropForeign('messages_from_user_foreign');
		});		
		
		Schema::table('requests', function($table){
			$table->dropForeign('requests_from_user_foreign');
		});	

		Schema::table('cities', function($table){
			$table->dropForeign('cities_country_code_foreign');
		});	
	}

}
