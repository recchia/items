<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/** Items routes */

Route::get('/', ['as' => 'items.index', 'uses' => 'ItemsController@index']);
Route::get('/items/create', ['as' => 'items.create', 'uses' => 'ItemsController@create']);
Route::post('/items/store', ['as' => 'items.store', 'uses' => 'ItemsController@store']);
Route::get('/items/{id}/show', ['as' => 'items.show', 'uses' => 'ItemsController@show']);
Route::get('/items/{id}/edit', ['as' => 'items.edit', 'uses' => 'ItemsController@edit']);
Route::post('/items/{id}/update', ['as' => 'items.update', 'uses' => 'ItemsController@update']);
Route::post('/items/{id}/delete', ['as' => 'items.delete', 'uses' => 'ItemsController@destroy']);

/** Categories routes */

Route::get('/categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
Route::get('/categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
Route::post('/categories/store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
Route::get('/categories/{id}/show', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
Route::get('/categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::post('/categories/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
Route::post('/categories/{id}/delete', ['as' => 'categories.delete', 'uses' => 'CategoriesController@destroy']);

/** Images routes */

Route::get('/images', ['as' => 'images.index', 'uses' => 'ImagesController@index']);
Route::get('/images/create', ['as' => 'images.create', 'uses' => 'ImagesController@create']);
Route::post('/images/store', ['as' => 'images.store', 'uses' => 'ImagesController@store']);
Route::get('/images/{id}/show', ['as' => 'images.show', 'uses' => 'ImagesController@show']);
Route::get('/images/{id}/edit', ['as' => 'images.edit', 'uses' => 'ImagesController@edit']);
Route::post('/images/{id}/update', ['as' => 'images.update', 'uses' => 'ImagesController@update']);
Route::post('/images/{id}/delete', ['as' => 'images.delete', 'uses' => 'ImagesController@destroy']);