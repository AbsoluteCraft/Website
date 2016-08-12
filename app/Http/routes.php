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
| Help & Support
|--------------------------------------------------------------------------
*/
Route::get('support', ['as' => 'support', 'uses' => 'SupportController@get']);
Route::get('support/kb', ['as' => 'support.knowledge-base', 'uses' => 'SupportController@getKnowledgeBase']);
Route::get('support/tickets', ['as' => 'support.tickets', 'uses' => 'SupportController@getTickets']);
Route::get('support/status', ['as' => 'support.status', 'uses' => 'SupportController@getStatus']);


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

Route::group(['middleware' => 'auth'], function() {

});
