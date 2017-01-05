<?php

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Api'], function() {
	Route::get('/', ['uses' => 'HomeController@get']);

	/*
	|--------------------------------------------------------------------------
	| Player
	|--------------------------------------------------------------------------
	*/
	Route::post('player/join', ['uses' => 'PlayerController@join']);
	Route::post('player/leave', ['uses' => 'PlayerController@leave']);

	Route::get('player', ['uses' => 'PlayerController@get']);
	Route::post('player', ['uses' => 'PlayerController@create']);
	Route::put('player', ['uses' => 'PlayerController@update']);
	Route::put('player/tokens/add', ['uses' => 'PlayerController@addTokens']);
	Route::put('player/tokens/remove', ['uses' => 'PlayerController@removeTokens']);

	/*
	|--------------------------------------------------------------------------
	| Leaderboard
	|--------------------------------------------------------------------------
	*/
	Route::get('leaderboard/tokens', ['uses' => 'LeaderboardController@getTokens']);
});
