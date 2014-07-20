<?php

Route::group(['prefix' => 'api/v1', 'before' => 'apiAuth'], function() {

    Route::get('/foo', function()
    {
        return 'bar';
    });


});

