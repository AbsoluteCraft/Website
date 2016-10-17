<?php

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function() {

	Route::get('/', ['as' => 'dashboard.home', 'uses' => 'DashboardController@getHome']);

	Route::get('users', ['as' => 'dashboard.users', 'uses' => 'DashboardController@getUsers']);
	Route::get('users/{id}', ['as' => 'dashboard.users.get', 'uses' => 'DashboardController@getUser']);
	Route::post('users/{id}', ['as' => 'dashboard.users.update', 'uses' => 'DashboardController@updateUser']);

	Route::get('donations', ['as' => 'dashboard.donations', 'uses' => 'DashboardController@getDonations']);
	Route::post('donations/{id}/approve', ['as' => 'dashboard.donations.approve', 'uses' => 'DashboardController@approveDonation']);

});
