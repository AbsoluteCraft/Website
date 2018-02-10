<?php

/*
|--------------------------------------------------------------------------
| Homepage / General
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@get']);
Route::get('tos', ['as' => 'terms', 'uses' => 'HomeController@getTerms']);
Route::get('privacy', ['as' => 'privacy', 'uses' => 'HomeController@getPrivacy']);

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
Route::get('donate', function() { return redirect()->route('shop'); });

Route::post('shop/buy', ['as' => 'shop.buy', 'uses' => 'ShopController@buy']);

Route::post('shop/donate', ['as' => 'shop.donate', 'uses' => 'ShopController@donate']);
Route::post('shop/paypal/ipn', ['as' => 'shop.paypal.ipn', 'uses' => 'PayPalController@ipn']);

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
| Leaderboard
|--------------------------------------------------------------------------
*/

Route::get('leaderboards', ['as' => 'leaderboards', 'uses' => 'LeaderboardController@get']);

/*
|--------------------------------------------------------------------------
| Account / Auth
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'Auth'], function() {
	Route::get('login', ['as' => 'auth.login', 'uses' => 'LoginController@showLoginForm']);
	Route::post('login', ['as' => 'auth.login-post', 'uses' => 'LoginController@login']);

	Route::post('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);

	Route::get('register', ['as' => 'auth.register', 'uses' => 'RegisterController@showRegistrationForm']);
	Route::post('register', ['as' => 'auth.register-post', 'uses' => 'RegisterController@register']);

	Route::get('recover/password', ['as' => 'auth.forgot-password', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
	Route::post('recover/password', ['as' => 'auth.forgot-password-post', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);

	Route::get('password/reset/{token}', ['as' => 'auth.reset-password', 'uses' => 'ResetPasswordController@showResetForm']);
	Route::post('password/reset', ['as' => 'auth.reset-password-post', 'uses' => 'ResetPasswordController@reset']);

	Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
});

include('api.php');
include('dashboard.php');
