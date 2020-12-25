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

    Route::get('/bantuan-penduduk/cari-penduduk/{penduduk}', 'BantuanPendudukController@cari_penduduk')->name('bantuan-penduduk.cari-penduduk');
    Route::get('/bantuan-penduduk/print/{bantuan}', 'BantuanPendudukController@print')->name('bantuan-penduduk.print');
    Route::get('/bantuan-penduduk/{bantuan}', 'BantuanPendudukController@index')->name('bantuan-penduduk.index');
    Route::get('/bantuan-penduduk/create/{bantuan}', 'BantuanPendudukController@create')->name('bantuan-penduduk.create');
    Route::get('/bantuan-penduduk/{bantuan_penduduk}/edit', 'BantuanPendudukController@edit')->name('bantuan-penduduk.edit');
    Route::post('/bantuan-penduduk', 'BantuanPendudukController@store')->name('bantuan-penduduk.store');
    Route::patch('/bantuan-penduduk/{bantuan_penduduk}', 'BantuanPendudukController@update')->name('bantuan-penduduk.update');
    Route::delete('/bantuan-penduduk/{bantuan_penduduk}', 'BantuanPendudukController@destroy')->name('bantuan-penduduk.destroy');
    Route::resource('bantuan', 'BantuanController');

});
