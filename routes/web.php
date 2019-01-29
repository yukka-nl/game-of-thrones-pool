<?php

Route::get('/', 'HomeController');

Route::get('/prediction', 'PredictionController@show');
Route::post('/prediction', 'PredictionController@store');

Route::post('/group', 'GroupController@store');
Route::get('/group/{name}', 'GroupController@show');
Route::get('/group/invite/{inviteCode}', 'GroupController@join');

// Social Logins
Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{platform}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/group', 'GroupController@show');