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
			$table->string('picture',100)->nullable();
		});

		Schema::table('packs', function($table){
			$table->string('picture',100)->nullable();
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
			$table->dropColumn('picture');
		});

		Schema::table('packs', function($table){
			$table->dropColumn('picture');
		});
	}

}
