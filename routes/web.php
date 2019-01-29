<?php

Route::get('/', 'HomeController');
Route::get('/prediction', 'PredictionController');

Route::get('/debug', function() {
   $characters = \App\Character::all()->pluck('name');
   $slugs = [];
   foreach($characters as $character) {
        array_push($slugs, str_slug($character));
   }
   dd($slugs);
});

// Social Logins
Route::get('login/{platform}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{platform}/callback', 'Auth\LoginController@handleProviderCallback');