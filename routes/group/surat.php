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
Route::get('/cetak-surat/{cetakSurat}', 'CetakSuratController@show')->name('cetak-surat.show');
Route::post('/buat-surat/{id}/{slug}', 'CetakSuratController@store')->name('cetak-surat.store');

Route::group(['middleware' => ['web', 'auth', 'peran']], function () {

    Route::prefix('surat')->group(function () {
        Route::get('/harian', 'HomeController@suratHarian')->name('surat-harian');
        Route::get('/bulanan', 'HomeController@suratBulanan')->name('surat-bulanan');
        Route::get('/tahunan', 'HomeController@suratTahunan')->name('surat-tahunan');
        Route::get('/chart/{id}', 'SuratController@chartSurat')->name('chart-surat');
        Route::post('/pengaturan', 'DesaController@pengaturan_surat')->name('surat.pengaturan');
        Route::resource('cetakSurat', 'CetakSuratController')->except('create','show','store','index');
        Route::resource('isiSurat', 'IsiSuratController')->except('index', 'create', 'edit', 'show');
    });
    Route::resource('surat', 'SuratController');

    Route::prefix('surat-masuk')->group(function () {
        Route::post('/print', 'SuratMasukController@print')->name('surat-masuk.print');
        Route::delete('/hapus', 'SuratMasukController@destroys')->name('surat-masuk.destroys');
    });
    Route::resource('surat-masuk', 'SuratMasukController');

    Route::prefix('surat-keluar')->group(function () {
        Route::post('/print', 'SuratKeluarController@print')->name('surat-keluar.print');
        Route::delete('/hapus', 'SuratKeluarController@destroys')->name('surat-keluar.destroys');
    });
    Route::resource('surat-keluar', 'SuratKeluarController');

});
