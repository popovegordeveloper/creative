<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/logout', 'SiteController@logout')->name('logout');
Route::get('/catalog/{slug_category?}', 'SiteController@catalog')->name('catalog')->middleware(\App\Http\Middleware\CheckCategory::class);
Route::get('/social_login/{provider}', 'SocialController@login')->name('social_login');
Route::get('/social_login/callback/{provider}', 'SocialController@callback');
Route::get('privacy-policy', 'SiteController@privacyPolicy')->name('privacy');
Route::get('rules-using', 'SiteController@rulesUsing')->name('rules');
Route::get('technical-support', 'SiteController@technicalSupport')->name('technical');
Route::get('sale', 'SiteController@sale')->name('sale');

Route::prefix('user')->group(function () {
    Route::get('activate/{hash}', 'UserController@activate')->name('user.activate');
    Route::post('update', 'UserController@update')->name('user.update');
});

Route::prefix('shop')->middleware('auth')->group(function () {
    Route::get('create', 'ShopController@create')->name('shop.create')->middleware('shop:no');
    Route::post('save', 'ShopController@save')->name('shop.save')->middleware('shop:no');
    Route::post('update', 'ShopController@update')->name('shop.update')->middleware('shop:yes');
    Route::get('{slug}', 'ShopController@show')->name('shop.show');
    Route::get('edit/{slug}', 'ShopController@edit')->name('shop.edit')->middleware(['shop:yes', 'has_shop']);
});

Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('create', 'ProductController@create')->name('product.create')->middleware('shop:yes');
    Route::post('save', 'ProductController@save')->name('product.save')->middleware('shop:yes');
    Route::post('update', 'ProductController@update')->name('product.update')->middleware('shop:yes');
    Route::get('{product}', 'ProductController@show')->name('product.show');
    Route::get('edit/{product}', 'ProductController@edit')->name('product.edit')->middleware('has_product');
    Route::post('add-favorite', 'ProductController@addFavorite')->name('product.add_favorite');
    Route::post('delete-favorite', 'ProductController@deleteFavorite')->name('product.delete_favorite');

});

Route::get('cabinet/{section?}', 'CabinetController@index')->name('cabinet');
