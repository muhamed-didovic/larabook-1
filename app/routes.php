<?php

//experimenting with responder package for api
// Route::get('/', function()
// {
//     $response = new Isimmons\Responder\Responder(new Isimmons\Responder\Response);
//     $text = $response->json(['error' => 'foo'], 300);
//     dd($text->getData()->data->error); //this might be what I need in the spec
// });

Route::get('/', 'PagesController@splash');

