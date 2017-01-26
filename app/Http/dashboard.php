<?php

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function() {

	Route::get('/', ['as' => 'dashboard.home', 'uses' => 'Dashboard\DashboardController@getHome']);
	Route::get('widget/resources', ['as' => 'dashboard.widget.resources', 'uses' => 'Dashboard\WidgetController@resources']);

	Route::get('users', ['as' => 'dashboard.users', 'uses' => 'Dashboard\DashboardController@getUsers']);
	Route::get('users/{id}', ['as' => 'dashboard.users.get', 'uses' => 'Dashboard\DashboardController@getUser']);
	Route::post('users/{id}', ['as' => 'dashboard.users.update', 'uses' => 'Dashboard\DashboardController@updateUser']);

	Route::get('donations', ['as' => 'dashboard.donations', 'uses' => 'Dashboard\DashboardController@getDonations']);
	Route::post('donations/{id}/approve', ['as' => 'dashboard.donations.approve', 'uses' => 'Dashboard\DashboardController@approveDonation']);

	Route::get('motd', ['as' => 'dashboard.motd', 'uses' => 'Dashboard\MotdController@get']);
	Route::post('motd', ['as' => 'dashboard.motd.create', 'uses' => 'Dashboard\MotdController@create']);
	Route::put('motd', ['as' => 'dashboard.motd.update', 'uses' => 'Dashboard\MotdController@update']);
	Route::delete('motd', ['as' => 'dashboard.motd.delete', 'uses' => 'Dashboard\MotdController@delete']);

	Route::get('announcements', ['as' => 'dashboard.announcements', 'uses' => 'Dashboard\AnnouncementController@get']);

	Route::get('server_poll', ['as' => 'dashboard.server_poll', 'uses' => 'Dashboard\ServerPollController@poll']);

});
