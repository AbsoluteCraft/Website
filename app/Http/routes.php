<?php

include('api.php');

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@get']);

/*
|--------------------------------------------------------------------------
| Status page
|--------------------------------------------------------------------------
*/

Route::get('status', ['as' => 'status', 'uses' => 'StatusController@get']);

/*
|--------------------------------------------------------------------------
| Token Shop
|--------------------------------------------------------------------------
*/

Route::get('shop', ['as' => 'shop', 'uses' => 'ShopController@get']);

/*
|--------------------------------------------------------------------------
| Projects
|--------------------------------------------------------------------------
*/

Route::get('projects', ['as' => 'projects', 'uses' => 'ProjectsController@get']);

/*
|--------------------------------------------------------------------------
| Players
|--------------------------------------------------------------------------
*/

Route::get('players', ['as' => 'players', 'uses' => 'PlayerController@getAll']);
Route::get('player', ['as' => 'player.search', 'uses' => 'PlayerController@search']);
Route::get('player/{username}', ['as' => 'player', 'uses' => 'PlayerController@get']);


/*
|--------------------------------------------------------------------------
| Account / Auth
|--------------------------------------------------------------------------
*/

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' => 'auth.login-post', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('register', ['as' => 'auth.register-post', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('recover/password', ['as' => 'auth.recover-password', 'uses' => 'Auth\PasswordController@getReset']);

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function() {

	Route::get('dashboard', ['as' => 'dashboard.home', 'uses' => 'DashboardController@getHome']);
	Route::get('dashboard/users', ['as' => 'dashboard.users', 'uses' => 'DashboardController@getUsers']);

});
