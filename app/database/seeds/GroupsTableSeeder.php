<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('groups')->delete();
		
		$groups = array(

			array('name' => 'admin'),
			array('name' => 'employee'),
			array('name' => 'student')
		);

		foreach ($groups as $group) {
			\Cartalyst\Sentry\Groups\Eloquent\Group::create($group);
		}
		
	}

}