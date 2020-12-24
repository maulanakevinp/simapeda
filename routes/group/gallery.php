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

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/kelola-gallery', 'GalleryController@index')->name('gallery.index');
    Route::post('/gallery', 'GalleryController@store')->name('gallery.store');
    Route::patch('/gallery', 'GalleryController@update')->name('gallery.update');
    Route::delete('/gallery/destroys', 'GalleryController@destroys')->name('gallery.destroys');
    Route::delete('/gallery/{gallery}', 'GalleryController@destroy')->name('gallery.destroy');

});
