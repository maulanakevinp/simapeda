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

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/akseptor-kb/{sex}', 'PendudukController@akseptor_kb')->name('penduduk.akseptor-kb');
    Route::get('/tambah-penduduk', 'PendudukController@create')->name('penduduk.create');
    Route::get('/penduduk/{nik}', 'PendudukController@show')->name('penduduk.show');
    Route::get('/detail-penduduk/{penduduk}', 'PendudukController@detail')->name('penduduk.detail');
    Route::get('/export-penduduk', 'PendudukController@export')->name('penduduk.export');
    Route::get('/cetak-penduduk', 'PendudukController@printAll')->name('penduduk.print_all');
    Route::get('/keluarga-penduduk', 'PendudukController@keluarga')->name('penduduk.keluarga');
    Route::get('/keluarga-penduduk/{kk}', 'PendudukController@detailKeluarga')->name('penduduk.keluarga.show');
    Route::get('/keluarga-penduduk/{kk}/cetak', 'PendudukController@printKeluarga')->name('penduduk.keluarga.print');
    Route::get('/cetak-keluarga-penduduk', 'PendudukController@printAllKeluarga')->name('penduduk.print_all_keluarga');
    Route::get('/calon-pemilih', 'PendudukController@calonPemilih')->name('penduduk.calon_pemilih');
    Route::get('/cetak-calon-pemilih', 'PendudukController@printCalonPemilih')->name('penduduk.print_calon_pemilih');
    Route::post('/import-penduduk', 'PendudukController@import')->name('penduduk.import');
    Route::post('/import-penduduk-opensid', 'PendudukController@import_opensid')->name('penduduk.import-opensid');
    Route::delete('/hapus-penduduk', 'PendudukController@destroys')->name('penduduk.destroys');
    Route::resource('penduduk', 'PendudukController')->except('create','show');

});
