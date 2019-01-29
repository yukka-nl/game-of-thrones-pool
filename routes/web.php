<?php

Route::get('/', 'HomeController');

Route::get('/prediction', 'PredictionController@show');
Route::post('/prediction', 'PredictionController@store');

Route::get('/groups/create', 'GroupController@create');
Route::post('/groups', 'GroupController@store');
Route::get('/groups/invite/{inviteCode}', 'GroupController@join');
Route::get('/groups', 'GroupController@index');
Route::get('/groups/{name}', 'GroupController@show');

// Social Logins
Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{platform}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/group', 'GroupController@show');