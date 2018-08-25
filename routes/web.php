<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/logout', 'SiteController@logout')->name('logout');

Route::prefix('user')->group(function () {
    Route::get('activate/{hash}', 'UserController@activate')->name('user.activate');
});
