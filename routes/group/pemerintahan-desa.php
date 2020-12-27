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

    Route::prefix('pemerintahan-desa')->group(function () {
        Route::post('/urutan', 'PemerintahanDesaController@urutan')->name('pemerintahan-desa.urutan');
        Route::post('/cetak', 'PemerintahanDesaController@printAll')->name('pemerintahan-desa.print_all');
        Route::post('/cetak-staff/{pemerintahan_desa}', 'PemerintahanDesaController@print')->name('pemerintahan-desa.print');
        Route::delete('/hapus', 'PemerintahanDesaController@destroys')->name('pemerintahan-desa.destroys');
    });
    Route::resource('pemerintahan-desa', 'PemerintahanDesaController');

});
