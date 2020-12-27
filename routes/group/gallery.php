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

Route::get('/gallery', 'GalleryController@gallery')->name('gallery');
Route::get('/load-gallery', 'HomeController@load_gallery')->name('load-gallery');

Route::group(['middleware' => ['web', 'auth', 'peran']], function () {

    Route::get('/kelola-gallery', 'GalleryController@index')->name('gallery.index');
    Route::post('/kelola-gallery', 'GalleryController@store')->name('gallery.store');
    Route::patch('/kelola-gallery', 'GalleryController@update')->name('gallery.update');
    Route::delete('/kelola-gallery/destroys', 'GalleryController@destroys')->name('gallery.destroys');
    Route::delete('/kelola-gallery/{gallery}', 'GalleryController@destroy')->name('gallery.destroy');

});
