<?php

class OauthClientsTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('groups')->delete();
		
		DB::table('oauth_clients')->insert(
		    array('id' => 'saqnelrfjqtplzwr', 'secret' => 'efwsrljppdkawrnef', 'name' =>'Default Web Client')
		);
		
	}

}