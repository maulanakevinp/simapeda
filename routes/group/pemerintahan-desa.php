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

    Route::get('/export-pemerintahan-desa', 'PemerintahanDesaController@export')->name('pemerintahan-desa.export');
    Route::post('/urutan-pemerintahan-desa', 'PemerintahanDesaController@urutan')->name('pemerintahan-desa.urutan');
    Route::post('/cetak-pemerintahan-desa', 'PemerintahanDesaController@printAll')->name('pemerintahan-desa.print_all');
    Route::post('/import-pemerintahan-desa', 'PemerintahanDesaController@import')->name('pemerintahan-desa.import');
    Route::delete('/hapus-pemerintah-desa', 'PemerintahanDesaController@destroys')->name('pemerintah-desa.destroys');
    Route::resource('pemerintahan-desa', 'PemerintahanDesaController');

});
