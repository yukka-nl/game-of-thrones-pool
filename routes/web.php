<?php

Route::get('/', 'HomeController')->name('home');
Route::get('/prediction', 'PredictionController@show');
Route::get('/groups/invite/{inviteCode}', 'GroupController@join')->name('invite-link');
Route::get('/groups/{groupId}', 'GroupController@show');

// Social Logins
Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{platform}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('register', 'Auth\RegisterController@registerPage');

// Auth routes
Route::group(['middleware' => ['auth']], function () {
    Route::post('/prediction', 'PredictionController@store');
    Route::get('/prediction/create', 'PredictionController@create')->name('make-prediction');
    Route::get('/create-group', 'GroupController@create');

    Route::post('/groups', 'GroupController@store');
    Route::get('/groups', 'GroupController@index');

    Route::get('/settings', 'SettingsController@show');
    Route::put('/settings', 'SettingsController@update');
    Route::delete('/settings', 'SettingsController@delete');
});