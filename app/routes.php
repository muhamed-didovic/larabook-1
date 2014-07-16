<?php

//experimenting with responder package for api
// Route::get('/', function()
// {
//     $response = new Isimmons\Responder\Responder(new Isimmons\Responder\Response);
//     $text = $response->json(['error' => 'foo'], 300);
//     dd($text->getData()->data->error); //this might be what I need in the spec
// });

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@splash']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::group(['before' => 'guest'], function()
{
    //only require the guest filter
    Route::get('login', ['as' => 'login.create', 'uses' => 'SessionsController@create']);
    Route::get('register', ['as' => 'register.create', 'uses' => 'RegistrationController@create']);

    //require both guest and csrf filter
    Route::group(['before' => 'csrf'], function()
    {
        Route::post('login', ['as' => 'login.store', 'uses' => 'SessionsController@store']);
        Route::post('register', ['as' => 'register.store', 'uses' => 'RegistrationController@store']);
    });
});

Route::group(['before' => 'auth|csrf'], function()
{
    Route::post('statuses', ['as' => 'status.store', 'uses' => 'StatusesController@store']);
});

Route::get('statuses', ['as' => 'statuses', 'uses' => 'StatusesController@index']);
