<?php

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Api'], function() {
	Route::get('/', ['uses' => 'HomeController@get']);

	Route::post('player/join', ['uses' => 'PlayerController@join']);
	Route::post('player/leave', ['uses' => 'PlayerController@leave']);

	Route::get('player/{uuid}', ['uses' => 'PlayerController@get']);
	Route::post('player', ['uses' => 'PlayerController@create']);
	Route::put('player/{uuid}', ['uses' => 'PlayerController@update']);

	Route::get('leaderboard/tokens', ['uses' => 'LeaderboardController@getTokens']);
});
