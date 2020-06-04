<?php

Route::get('/', 'Site\SiteController@index')->name('home');

Route::group(['middleware' => ['auth'], 'namespace' => 'admin', 'prefix' => 'admin'], function(){

	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::get('create', 'AdminController@create')->name('admin.create');

	Route::get('listar-posts', 'PostController@index')->name('admin.listarPost');
	Route::get('ediar/{id}/post', 'AdminController@update')->name('admin.update');

	Route::get('listar-users', 'AdminController@listarUser')->name('admin.listarUser');
	Route::get('roles-permissions', 'AdminController@rolesPermissions')->name('admin.rolesPermissions');

	Route::get('listar-permissions', 'PermissionController@index')->name('admin.permission');

	Route::get('listar-roles', 'RoleController@index')->name('admin.role');


	});


Auth::routes();

