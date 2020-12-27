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

    Route::prefix('database')->group(function () {
        Route::get('/', 'DatabaseController@index')->name('database.index');
        Route::get('/backup', 'DatabaseController@backup')->name('database.backup');
        Route::post('/restore', 'DatabaseController@restore')->name('database.restore');

        Route::get('/folder/backup', 'DatabaseController@folder_backup')->name('folder.backup');
        Route::post('/folder/restore', 'DatabaseController@folder_restore')->name('folder.restore');

        Route::get('/pemerintahan-desa/export', 'PemerintahanDesaController@export')->name('pemerintahan-desa.export');
        Route::post('/pemerintahan-desa/import', 'PemerintahanDesaController@import')->name('pemerintahan-desa.import');

        Route::get('/penduduk/export', 'PendudukController@export')->name('penduduk.export');
        Route::post('/import-penduduk', 'PendudukController@import')->name('penduduk.import');
        Route::post('/import-penduduk-opensid', 'PendudukController@import_opensid')->name('penduduk.import-opensid');
        Route::post('/import-penduduk-prodeskel', 'PendudukController@import_prodeskel')->name('penduduk.import-prodeskel');
    });
});
