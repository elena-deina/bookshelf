<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return redirect(\route('authors.index'));
});

Route::get('authors', 'AuthorController@index')->name('authors.index');

/*
 |
 | Admin panel
 |
 */
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['role:admin'])->group(function () {
    Route::name('authors.')->prefix('authors')->group(function () {
        Route::get('/', 'AuthorController@index')->name('index');
        Route::get('/create', 'AuthorController@create')->name('create');
        Route::get('/{author}', 'AuthorController@view')->name('view');
        Route::get('/{author}/edit', 'AuthorController@edit')->name('edit');
        Route::put('/{author}', 'AuthorController@update')->name('update');
        Route::post('/', 'AuthorController@store')->name('store');
        Route::delete('/{author}', 'AuthorController@destroy')->name('destroy');
    });

    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', 'BookController@index')->name('index');
        Route::get('/create', 'BookController@create')->name('create');
        Route::get('/{book}', 'BookController@view')->name('view');
        Route::get('/{book}/edit', 'BookController@edit')->name('edit');
        Route::put('/{book}', 'BookController@update')->name('update');
        Route::post('/', 'BookController@store')->name('store');
        Route::delete('/{book}', 'BookController@destroy')->name('destroy');
    });
});
