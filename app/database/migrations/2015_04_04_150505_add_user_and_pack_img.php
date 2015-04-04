<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAndPackImg extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->string('user_picture',100)->nullable();
		});

		Schema::table('packs', function($table){
			$table->string('pack_picture',100)->nullable();
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
			$table->dropColumn('user_picture');
		});

		Schema::table('packs', function($table){
			$table->dropColumn('pack_picture');
		});
	}

}
