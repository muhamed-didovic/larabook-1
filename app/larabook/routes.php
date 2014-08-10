<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'Larabook\Controllers\PagesController@splash'
]);


/*
|--------------------------------------------------------------------------
| Session Routes
|--------------------------------------------------------------------------
*/
/* login/logout */
Route::get('login', [
    'as' => 'login.create',
    'before' => 'guest',
    'uses' => 'Larabook\Controllers\SessionsController@create'
]);

Route::post('login', [
    'as' => 'login.store',
    'before' => 'csrf',
    'uses' => 'Larabook\Controllers\SessionsController@store'
]);

Route::get('logout', [
    'as' => 'logout',
    'before' => 'auth',
    'uses' => 'Larabook\Controllers\SessionsController@destroy'
]);
/* registration */
Route::get('register', [
    'as' => 'register.create',
    'before' => 'guest',
    'uses' => 'Larabook\Controllers\RegistrationController@create'
]);

Route::post('register', [
    'as' => 'register.store',
    'before' => 'csrf',
    'uses' => 'Larabook\Controllers\RegistrationController@store'
]);

/*
|--------------------------------------------------------------------------
| Statuses
|--------------------------------------------------------------------------
*/
Route::get('statuses', [
    'as' => 'statuses',
    'before' => 'auth',
    'uses' => 'Larabook\Controllers\StatusesController@index'
]);
Route::post('statuses', [
    'as' => 'status.store',
    'before' => 'csrf|auth',
    'uses' => 'Larabook\Controllers\StatusesController@store'
]);

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/
Route::get('settings/{username}', [
    'as' => 'user.settings',
    'before' => 'auth',
    'uses' => 'Larabook\Controllers\UsersController@settings'
]);

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
*/
Route::get('users', [
    'as' => 'users.index',
    'uses' => 'Larabook\Controllers\UsersController@index'
]);

Route::get('@{username}', [
    'as' => 'users.profile',
    'uses' => 'Larabook\Controllers\UsersController@show'
]);

/*
|--------------------------------------------------------------------------
| Follows
|--------------------------------------------------------------------------
*/
Route::post('follows', [
    'as' => 'follows.store',
    'before' => 'auth',
    'uses' => 'Larabook\Controllers\FollowsController@store'
]);

Route::delete('follows/{id}', [
    'as' => 'follows.destroy',
    'uses' => 'Larabook\Controllers\FollowsController@destroy'
]);
