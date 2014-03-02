<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'TodoController@getIndex');
Route::get('done/{id}', 'TodoController@getDone');
Route::get('delete/{id}', 'TodoController@getDelete');

Route::post('add', 'TodoController@postAdd');
Route::post('update/{id}', 'TodoController@postUpdate');