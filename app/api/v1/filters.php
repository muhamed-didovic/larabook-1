<?php

Route::filter('foo', function () {
    return foo(); //test the filter and helper at the same time :-)
});

Route::filter('apiAuth', function () {
    //if it's not conflicting with the apps auth filter should be able to access the api in the browser
    return 'you are authorized foo!';
});
