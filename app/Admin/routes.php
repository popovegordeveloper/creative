<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('messages/{conversation}', ['as' => 'admin.messages', 'uses' => 'App\Admin\Http\Controllers\AdminController@messages']);