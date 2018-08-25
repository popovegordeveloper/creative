<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
