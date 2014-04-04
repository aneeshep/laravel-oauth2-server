<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();
		
		$users = array(

			array('username' => 'admin', 'password' => 'password', 'email' => 'admin@example.com', 'activated' =>  true),
			
		);

		foreach ($users as $user) {
			//\Cartalyst\Sentry\Users\Eloquent\User::create($user);

			Sentry::getUserProvider()->create($user);
		}
		
	}

}