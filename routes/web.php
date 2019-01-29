<?php

Route::get('/', 'HomeController');

Route::get('/prediction', 'PredictionController@show');
Route::post('/prediction', 'PredictionController@store');

Route::get('/group/create', 'GroupController@create');
Route::post('/group', 'GroupController@store');
Route::get('/group/invite/{inviteCode}', 'GroupController@join');
Route::get('/group/{name}', 'GroupController@show');

// Social Logins
Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{platform}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/group', 'GroupController@show');