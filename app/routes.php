<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::resource('user', 'UserController');
Route::post('oauth/access_token', function()
{
    return AuthorizationServer::performAccessTokenFlow();
});

Route::get('secure-route', array('before' => 'oauth:webapp', function(){
	$ownerId = ResourceServer::getOwnerId();
	echo Sentry::findUserById($ownerId)->email;
    return "oauth secured route";
}));
