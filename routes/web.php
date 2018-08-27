<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/logout', 'SiteController@logout')->name('logout');
Route::get('/catalog/{slug_category?}', 'SiteController@catalog')->name('catalog')->middleware(\App\Http\Middleware\CheckCategory::class);
Route::get('/social_login/{provider}', 'SocialController@login')->name('social_login');
Route::get('/social_login/callback/{provider}', 'SocialController@callback');

Route::prefix('user')->group(function () {
    Route::get('activate/{hash}', 'UserController@activate')->name('user.activate');
    Route::post('update', 'UserController@update')->name('user.update');
});

Route::prefix('shop')->middleware('auth')->group(function () {
    Route::get('create', 'ShopController@create')->name('shop.create');
    Route::post('save', 'ShopController@save')->name('shop.save');
    Route::get('{slug}', 'ShopController@show')->name('shop.show');
});

Route::get('cabinet/{section?}', 'CabinetController@index')->name('cabinet');
