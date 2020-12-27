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

Route::get('/penduduk/cari','PendudukController@cari')->name('penduduk.cari');
Route::get('/statistik-penduduk', 'GrafikController@index')->name('statistik-penduduk');
Route::get('/statistik-penduduk/show', 'GrafikController@show')->name('statistik-penduduk.show');

Route::group(['middleware' => ['web', 'auth', 'peran']], function () {

    Route::prefix('penduduk')->group(function () {
        Route::get('/akseptor-kb/{sex}', 'PendudukController@akseptor_kb')->name('penduduk.akseptor-kb');
        Route::get('/create', 'PendudukController@create')->name('penduduk.create');
        Route::get('/cetak', 'PendudukController@printAll')->name('penduduk.print_all');
        Route::get('/detail/{penduduk}', 'PendudukController@detail')->name('penduduk.detail');
        Route::get('/{nik}', 'PendudukController@show')->name('penduduk.show');
        Route::delete('/hapus', 'PendudukController@destroys')->name('penduduk.destroys');
    });
    Route::resource('penduduk', 'PendudukController')->except('create','show');

    Route::prefix('keluarga-penduduk')->group(function () {
        Route::get('/', 'PendudukController@keluarga')->name('penduduk.keluarga');
        Route::get('/{kk}/cetak', 'PendudukController@printKeluarga')->name('penduduk.keluarga.print');
        Route::get('/cetak', 'PendudukController@printAllKeluarga')->name('penduduk.print_all_keluarga');
        Route::get('/{kk}', 'PendudukController@detailKeluarga')->name('penduduk.keluarga.show');
    });

    Route::prefix('calon-pemilih')->group(function () {
        Route::get('/', 'PendudukController@calonPemilih')->name('penduduk.calon_pemilih');
        Route::get('/cetak', 'PendudukController@printCalonPemilih')->name('penduduk.print_calon_pemilih');
    });

});
