<?php

Route::get('/', 'HomeController');
Route::get('/prediction', 'PredictionController');

// Social Logins
Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{platform}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/group', 'GroupController@show');