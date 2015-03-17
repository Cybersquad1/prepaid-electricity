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

Route::get('/', 'UsersController@getLogin');
Route::get('/register', 'UsersController@getRegister');
Route::post('/register', 'UsersController@postCreate');
Route::get('/login', 'UsersController@getLogin');
Route::post('/login', 'UsersController@postSignin');
Route::get('/dashboard', 'UsersController@getDashboard');
Route::get('/logout', 'UsersController@getLogout');
Route::get('/payment', 'UsersController@getPayment');
Route::get('/payment', 'UsersController@populateUnit');
Route::post('/payment', 'UsersController@postPayment');
Route::get('/', 'UsersController@getHome');
Route::get('/status', 'UsersController@getStatus');
Route::get('/report', 'UsersController@getSummary');