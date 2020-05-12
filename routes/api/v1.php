<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('books.')->prefix('books')->group(function () {
    Route::get('/', 'BookController@index')->name('index');
    Route::get('{book}', 'BookController@view')->name('view');
    Route::post('/', 'BookController@store')->name('store');
    Route::put('{book}', 'BookController@update')->name('update');
    Route::delete('{book}', 'BookController@destroy')->name('destroy');
});
