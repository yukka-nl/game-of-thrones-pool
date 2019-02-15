<?php

Route::get('/', 'HomeController')->name('home');

Route::get('/statistics', 'StatisticsPageController');
Route::get('/prediction', 'PredictionController@show');
Route::get('/prediction/user/{userId}', 'PredictionController@show');

Route::get('/houses', 'HouseController@index');
Route::post('/houses/join', 'HouseController@join');

Route::get('/groups/{slug}', 'GroupController@show');
Route::get('/groups/invite/{inviteCode}', 'GroupController@join')->name('invite-link');
Route::post('/groups/leave/{uuid}', 'GroupController@leave');
Route::get('/groups/{groupId}', 'GroupController@show');

Route::get('/privacy', 'PageController@privacy');
Route::get('/terms-of-service', 'PageController@tos');

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

    Route::get('/prediction/edit', 'PredictionController@edit');
    Route::put('/prediction', 'PredictionController@update');
});

Route::get('/debug', function (){
    \Illuminate\Support\Facades\DB::table('houses')->insert([
        [
            'name' => 'Baratheon',
            'image' => 'baratheon.svg',
        ],
        [
            'name' => 'Arryn',
            'image' => 'arryn.svg',
        ],
        [
            'name' => 'Greyjoy',
            'image' => 'greyjoy.svg',
        ],
        [
            'name' => 'Lannister',
            'image' => 'lannister.svg',
        ],
        [
            'name' => 'Martell',
            'image' => 'martell.svg',
        ],
        [
            'name' => 'Stark',
            'image' => 'stark.svg',
        ],
        [
            'name' => 'Targaryen',
            'image' => 'targaryen.svg',
        ],
        [
            'name' => 'Tully',
            'image' => 'tully.svg',
        ],
        [
            'name' => 'Tyrell',
            'image' => 'tyrell.svg',
        ],
        [
            'name' => 'Freefolk',
            'image' => 'freefolk.svg',
        ],
    ]);
});