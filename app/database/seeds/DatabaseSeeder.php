<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		DB::beginTransaction();
		DB::table('countries')->insertGetId(
		    array('code' => 'mx', 'name' => 'Mexico')
		);
		DB::commit();

		DB::beginTransaction();
		DB::table('cities')->insertGetId(
		    array('country_code' => 'mx', 'name' => 'Merida')
		);
		DB::commit();

		// $this->call('UserTableSeeder');
	}

}
