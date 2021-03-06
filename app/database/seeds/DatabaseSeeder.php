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

		

		$this->call('GroupsTableSeeder');
		$this->command->info('Groups Table seeded');


		$this->call('UsersTableSeeder');
		$this->command->info('Users Table seeded');

		$this->call('OauthClientsTableSeeder');
		$this->command->info('OauthClient Table seeded');

		$this->call('OauthScopesTableSeeder');
		$this->command->info('OauthScopes Table seeded');
		
	}

}