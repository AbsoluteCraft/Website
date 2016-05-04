<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@get']);

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' => 'auth.login-post', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('register', ['as' => 'auth.register-post', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('recover/password', ['as' => 'auth.recover-password', 'uses' => 'Auth\PasswordController@getReset']);