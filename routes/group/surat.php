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

Route::get('/layanan-surat', 'SuratController@layanan_surat')->name('layanan-surat');
Route::get('/buat-surat/{id}/{slug}', 'CetakSuratController@create')->name('buat-surat');
Route::post('/cetak-surat/{id}/{slug}', 'CetakSuratController@store')->name('cetak-surat.store');

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/surat-harian', 'HomeController@suratHarian')->name('surat-harian');
    Route::get('/surat-bulanan', 'HomeController@suratBulanan')->name('surat-bulanan');
    Route::get('/surat-tahunan', 'HomeController@suratTahunan')->name('surat-tahunan');
    Route::get('/chart-surat/{id}', 'SuratController@chartSurat')->name('chart-surat');
    Route::get('/tambah-surat', 'SuratController@create')->name('surat.create');
    Route::post('/surat/pengaturan', 'DesaController@pengaturan_surat')->name('surat.pengaturan');
    Route::resource('/cetakSurat', 'CetakSuratController')->except('create','store','index');
    Route::resource('/surat', 'SuratController')->except('create');
    Route::resource('/isiSurat', 'IsiSuratController')->except('index', 'create', 'edit', 'show');

    Route::post('/surat-masuk/print', 'SuratMasukController@print')->name('surat-masuk.print');
    Route::delete('/hapus-surat-masuk', 'SuratMasukController@destroys')->name('surat-masuk.destroys');
    Route::resource('surat-masuk', 'SuratMasukController');

    Route::post('/surat-keluar/print', 'SuratKeluarController@print')->name('surat-keluar.print');
    Route::delete('/hapus-surat-keluar', 'SuratKeluarController@destroys')->name('surat-keluar.destroys');
    Route::resource('surat-keluar', 'SuratKeluarController');

});
