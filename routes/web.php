<?php

Route::get('/', 'HomeController');
Route::get('/prediction', 'PredictionController@show');
Route::get('/groups/invite/{inviteCode}', 'GroupController@join');
Route::get('/groups/{slug}', 'GroupController@show');

// Social Logins
Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{platform}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('register', 'Auth\RegisterController@registerPage');

// Auth routes
Route::group(['middleware' => ['auth']], function () {
    Route::post('/prediction', 'PredictionController@store');
    Route::get('/prediction/create', 'PredictionController@create');
    Route::get('/groups/create', 'GroupController@create');
    Route::post('/groups', 'GroupController@store');
    Route::get('/groups', 'GroupController@index');

    Route::get('/settings', 'SettingsController@show');
    Route::put('/settings', 'SettingsController@update');
});