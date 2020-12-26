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

    Route::get('/grup-penduduk/cari-penduduk/{penduduk}', 'GrupPendudukController@cari_penduduk')->name('grup-penduduk.cari-penduduk');
    Route::get('/grup-penduduk/print/{grup}', 'GrupPendudukController@print')->name('grup-penduduk.print');
    Route::get('/grup-penduduk/{grup}', 'GrupPendudukController@index')->name('grup-penduduk.index');
    Route::get('/grup-penduduk/create/{grup}', 'GrupPendudukController@create')->name('grup-penduduk.create');
    Route::get('/grup-penduduk/{grup_penduduk}/edit', 'GrupPendudukController@edit')->name('grup-penduduk.edit');
    Route::post('/grup-penduduk', 'GrupPendudukController@store')->name('grup-penduduk.store');
    Route::patch('/grup-penduduk/{grup_penduduk}', 'GrupPendudukController@update')->name('grup-penduduk.update');
    Route::delete('/grup-penduduk/{grup_penduduk}', 'GrupPendudukController@destroy')->name('grup-penduduk.destroy');
    Route::resource('grup', 'GrupController');

});
