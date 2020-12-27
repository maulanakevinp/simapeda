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

Route::group(['middleware' => ['web', 'auth', 'peran']], function () {

    Route::prefix('artikel')->group(function () {
        Route::post('/{artikel}/slide', 'ArtikelController@slide')->name('artikel.slide');
        Route::post('/gallery','ArtikelGalleryController@store')->name('artikel-gallery.store');
        Route::patch('/gallery/{artikel_gallery}','ArtikelGalleryController@update')->name('artikel-gallery.update');
        Route::delete('/gallery/{artikel_gallery}','ArtikelGalleryController@destroy')->name('artikel-gallery.destroy');
    });
    Route::resource('/artikel', 'ArtikelController')->except('show');

});
