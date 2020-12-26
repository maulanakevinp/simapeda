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

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/kelola-artikel', 'ArtikelController@index')->name('artikel.index');
    Route::get('/tambah-artikel', 'ArtikelController@create')->name('artikel.create');
    Route::get('/edit-artikel/{artikel}', 'ArtikelController@edit')->name('artikel.edit');
    Route::post('/artikel/{artikel}/slide', 'ArtikelController@slide')->name('artikel.slide');
    Route::post('/artikel-gallery','ArtikelGalleryController@store')->name('artikel-gallery.store');
    Route::patch('/artikel-gallery/{artikel_gallery}','ArtikelGalleryController@update')->name('artikel-gallery.update');
    Route::delete('/artikel-gallery/{artikel_gallery}','ArtikelGalleryController@destroy')->name('artikel-gallery.destroy');
    Route::resource('/artikel', 'ArtikelController')->except('create','show','index','edit');

});
