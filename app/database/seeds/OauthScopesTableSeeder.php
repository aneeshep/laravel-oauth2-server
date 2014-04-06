<?php

class OauthScopesTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('groups')->delete();

		$scopes = array(
			array('scope' => 'webapp', 'name' => 'webapp', 'description' =>'Scope for Default Web Client'),
		    array('scope' => 'basic', 'name' => 'basic', 'description' =>'Basic scope with no permission')
			);
		
		foreach ($scopes as $scope) {
			
			DB::table('oauth_scopes')->insert($scope);
		}
	}

}