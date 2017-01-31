<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/






Route::get('contact', 'PagesController@getContact');
Route::get('/', 'PagesController@getIndex')->name('index');

Route::resource('users','userController');
Route::resource('maquinas','MaquinaController');
Route::resource('espacios','EspacioController');
Route::resource('publicidad','PublicidadController');

Auth::routes();
