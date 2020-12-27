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

    Route::prefix('analisis/{analisis}')->group(function () {
        Route::get('/input/{periode}', 'InputController@index')->name('input.index');
        Route::get('/input/{penduduk}/edit/{periode}', 'InputController@edit')->name('input.edit');
        Route::get('/input/statistik/{indikator}', 'IndikatorController@statistik')->name('indikator.statistik');
        Route::get('/input/responden/{indikator}/{parameter}', 'IndikatorController@responden')->name('indikator.responden');
        Route::get('/laporan-per-indikator', 'IndikatorController@laporan')->name('indikator.laporan');
        Route::get('/laporan-hasil-klasifikasi/{periode}', 'KlasifikasiController@laporan')->name('klasifikasi.laporan');
        Route::get('/laporan-hasil-klasifikasi/{penduduk}/detail/{periode}', 'KlasifikasiController@detail_laporan')->name('klasifikasi.detail-laporan');
        Route::post('/input', 'InputController@store')->name('input.store');
        Route::resource('kategori', 'KategoriController');
        Route::resource('indikator', 'IndikatorController');
        Route::resource('klasifikasi', 'KlasifikasiController');
        Route::resource('periode', 'PeriodeController');
    });

    Route::prefix('analisis')->group(function () {
        Route::get('/indikator/{indikator}/chart', 'IndikatorController@chart')->name('indikator.chart');
        Route::delete('/hapus-kategori', 'KategoriController@destroys')->name('kategori.destroys');
        Route::delete('/hapus-indikator', 'IndikatorController@destroys')->name('indikator.destroys');
        Route::delete('/hapus-klasifikasi', 'KlasifikasiController@destroys')->name('klasifikasi.destroys');
        Route::delete('/hapus-periode', 'PeriodeController@destroys')->name('periode.destroys');
        Route::delete('/hapus-analisis', 'AnalisisController@destroys')->name('analisis.destroys');
    });

    Route::resource('analisis', 'AnalisisController');

});
