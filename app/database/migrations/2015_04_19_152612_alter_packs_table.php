<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('packs', function($table){
			$table->dropColumn('volume');
		});

		Schema::table('packs', function($table){
			$table->string('size', 14);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('packs', function($table){
			$table->dropColumn('size');
		});

		Schema::table('packs', function($table){
			$table->integer('volume')->unsigned();
		});
	}

}
