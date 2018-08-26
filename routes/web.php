<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/logout', 'SiteController@logout')->name('logout');
Route::get('/catalog/{slug_category?}', 'SiteController@catalog')->name('catalog')->middleware(\App\Http\Middleware\CheckCategory::class);;

Route::prefix('user')->group(function () {
    Route::get('activate/{hash}', 'UserController@activate')->name('user.activate');
});

