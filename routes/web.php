<?php

Auth::routes();


Route::get('/about', 'SiteController@about')->name('about');
Route::get('/logout', 'SiteController@logout')->name('logout');

Route::prefix('user')->group(function () {
    Route::get('activate/{hash}', 'UserController@activate')->name('user.activate');
});

Route::get('/{category?}', 'SiteController@index')->name('home');
