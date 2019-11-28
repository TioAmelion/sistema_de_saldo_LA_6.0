<?php

Route::get('/', 'Site\SiteController@index')->name('home');

Route::group(['middleware' => ['auth'], 'namespace' => 'admin', 'prefix' => 'admin'], function(){

	Route::get('/', 'AdminController@index')->name('admin.home');

	//Balance CRUD OPERATIONS
	Route::get('balanco', 'BalanceController@index')->name('admin.balance');
	Route::get('deposito', 'BalanceController@deposit')->name('admin.deposit');
	Route::post('deposito/cadastrar', 'BalanceController@store')->name('admin.deposit.store');
});


Auth::routes();

