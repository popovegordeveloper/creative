<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/logout', 'SiteController@logout')->name('logout');
