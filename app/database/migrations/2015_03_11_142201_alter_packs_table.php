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
			$table->dropForeign('packs_from_city_foreign');
			$table->dropForeign('packs_to_city_foreign');
			$table->dropColumn('from_city');
			$table->dropColumn('to_city');
		});

		Schema::table('packs', function($table){
			$table->string('from_city',100);
			$table->string('to_city',100);
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
			$table->dropColumn('from_city');
			$table->dropColumn('to_city');
		});

		Schema::table('packs', function($table){
			$table->integer('from_city')->unsigned();
			$table->integer('to_city')->unsigned();
			$table->foreign('from_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
			$table->foreign('to_city')->references('id')->on('cities')->onDelete('RESTRICT')->onUpdate('CASCADE');
		});
	}

}
