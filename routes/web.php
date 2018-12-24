<?php

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/about', 'SiteController@about')->name('about');
Route::get('/logout', 'SiteController@logout')->name('logout');
Route::get('/catalog/{slug_category?}/{slug_subcategory?}', 'SiteController@catalog')->name('catalog')->middleware(\App\Http\Middleware\CheckCategory::class);
Route::get('categories', 'SiteController@categories')->name('categories');
//Route::get('/catalog/{slug_category?}/{slug_subcategory?}', 'SiteController@catalog')->name('catalog');
Route::get('/social_login/{provider}', 'SocialController@login')->name('social_login');
Route::get('/social_login/callback/{provider}', 'SocialController@callback');
Route::get('privacy-policy', 'SiteController@privacyPolicy')->name('privacy');
Route::get('rules-using', 'SiteController@rulesUsing')->name('rules');
Route::get('technical-support', 'SiteController@technicalSupport')->name('technical');
Route::get('sale', 'SiteController@sale')->name('sale');
Route::post('search', 'SiteController@search')->name('search');
Route::get('faq/{question_id?}', 'SiteController@faq')->name('faq');

Route::prefix('mail')->group(function () {
    Route::post('product', 'MailController@sendProduct')->name('mail.product');
    Route::post('shop', 'MailController@sendShop')->name('mail.shop');
    Route::post('about', 'MailController@sendAbout')->name('mail.about');
    Route::post('answer', 'MailController@sendAnswer')->name('mail.answer');
});

Route::prefix('user')->group(function () {
    Route::get('activate/{hash}', 'UserController@activate')->name('user.activate');
    Route::post('update', 'UserController@update')->name('user.update');
});

Route::prefix('shop')->middleware('auth')->group(function () {
    Route::get('create', 'ShopController@create')->name('shop.create')->middleware('shop:no');
    Route::post('save', 'ShopController@save')->name('shop.save')->middleware('shop:no');
    Route::post('update', 'ShopController@update')->name('shop.update')->middleware('shop:yes');
    Route::get('edit/{slug}', 'ShopController@edit')->name('shop.edit')->middleware(['shop:yes', 'has_shop']);
});

Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('create', 'ProductController@create')->name('product.create')->middleware('shop:yes');
    Route::post('save', 'ProductController@save')->name('product.save')->middleware('shop:yes');
    Route::post('update', 'ProductController@update')->name('product.update')->middleware('shop:yes');
    Route::get('edit/{product}', 'ProductController@edit')->name('product.edit')->middleware('has_product');
    Route::post('add-favorite', 'ProductController@addFavorite')->name('product.add_favorite');
    Route::post('delete-favorite', 'ProductController@deleteFavorite')->name('product.delete_favorite');
    Route::post('delete', 'ProductController@delete')->name('product.delete');
});

Route::prefix('cart')->group(function () {
    Route::get('/', 'CartController@index')->name('cart');
    Route::post('add', 'CartController@add')->name('cart.add');
    Route::post('delete', 'CartController@delete')->name('cart.delete');
    Route::post('minus', 'CartController@minus')->name('cart.update');
    Route::post('plus', 'CartController@plus')->name('cart.update.plus');
    Route::post('delete-all', 'CartController@deleteAll')->name('cart.delete.all');
    Route::post('change-delivery', 'CartController@changeDelivery')->name('cart.update.delivery');
    Route::post('change-payment', 'CartController@changePayment')->name('cart.update.payment');
});

Route::prefix('order')->group(function () {
    Route::post('create', 'OrderController@create')->name('order.create');
    Route::post('cancel', 'OrderController@cancel')->name('order.cancel');
    Route::post('accept', 'OrderController@accept')->name('order.accept');
    Route::post('send', 'OrderController@accept')->name('order.send');
    Route::post('completed', 'OrderController@completed')->name('order.completed');
    Route::post('end', 'OrderController@end')->name('order.end');
});

Route::prefix('vacancy')->group(function () {
    Route::get('/', 'VacancyController@index')->name('vacancy');
    Route::get('{vacancy}', 'VacancyController@show')->name('vacancy.show');
});

Route::prefix('blog')->group(function () {
    Route::get('/', 'ArticleController@index')->name('blog');
    Route::get('{article}', 'ArticleController@show')->name('blog.show');
});

Route::prefix('message')->middleware('auth')->group(function () {
    Route::post('create', 'MessageController@create')->name('message.create');
    Route::post('conversation', 'MessageController@conversation')->name('message.conversation');
});

Route::get('product/{product}', 'ProductController@show')->name('product.show')->middleware([
    \App\Http\Middleware\CheckModeration::class,
    \App\Http\Middleware\CheckActiveProduct::class
]);
Route::get('shop/{slug}', 'ShopController@show')->name('shop.show')->middleware(\App\Http\Middleware\CheckActiveShop::class);

Route::get('cabinet/{section?}', 'CabinetController@index')->name('cabinet')->middleware('auth');
