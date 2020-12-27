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

    Route::prefix('inventaris')->group(function () {
        Route::get('/', function () {return redirect()->route('tanah.index');});

        Route::get('laporan', 'InventarisLaporanController@index')->name("laporan.index");
        Route::post('laporan/print', 'InventarisLaporanController@print')->name("laporan.print");

        Route::prefix('tanah')->group(function () {
            Route::get('mutasi', 'InventarisTanahController@mutasi')->name("tanah.mutasi");
            Route::get('mutasi/{tanah}/edit', 'InventarisTanahController@mutasi_edit')->name("tanah.mutasi.edit");
            Route::post('print', 'InventarisTanahController@print')->name("tanah.print");
            Route::patch('mutasi/{tanah}', 'InventarisTanahController@mutasi_update')->name("tanah.mutasi.update");
        });
        Route::resource('tanah', 'InventarisTanahController');

        Route::prefix('peralatan')->group(function () {
            Route::get('mutasi', 'InventarisPeralatanController@mutasi')->name("peralatan.mutasi");
            Route::get('mutasi/{peralatan}/edit', 'InventarisPeralatanController@mutasi_edit')->name("peralatan.mutasi.edit");
            Route::post('print', 'InventarisPeralatanController@print')->name("peralatan.print");
            Route::patch('mutasi/{peralatan}', 'InventarisPeralatanController@mutasi_update')->name("peralatan.mutasi.update");
        });
        Route::resource('peralatan', 'InventarisPeralatanController');

        Route::prefix('gedung')->group(function () {
            Route::get('mutasi', 'InventarisGedungController@mutasi')->name("gedung.mutasi");
            Route::get('mutasi/{gedung}/edit', 'InventarisGedungController@mutasi_edit')->name("gedung.mutasi.edit");
            Route::post('print', 'InventarisGedungController@print')->name("gedung.print");
            Route::patch('mutasi/{gedung}', 'InventarisGedungController@mutasi_update')->name("gedung.mutasi.update");
        });
        Route::resource('gedung', 'InventarisGedungController');

        Route::prefix('jalan')->group(function () {
            Route::get('mutasi', 'InventarisJalanController@mutasi')->name("jalan.mutasi");
            Route::get('mutasi/{jalan}/edit', 'InventarisJalanController@mutasi_edit')->name("jalan.mutasi.edit");
            Route::post('print', 'InventarisJalanController@print')->name("jalan.print");
            Route::patch('mutasi/{jalan}', 'InventarisJalanController@mutasi_update')->name("jalan.mutasi.update");
        });
        Route::resource('jalan', 'InventarisJalanController');

        Route::prefix('asset')->group(function () {
            Route::get('mutasi', 'InventarisAssetController@mutasi')->name("asset.mutasi");
            Route::get('mutasi/{asset}/edit', 'InventarisAssetController@mutasi_edit')->name("asset.mutasi.edit");
            Route::post('print', 'InventarisAssetController@print')->name("asset.print");
            Route::patch('mutasi/{asset}', 'InventarisAssetController@mutasi_update')->name("asset.mutasi.update");
        });
        Route::resource('asset', 'InventarisAssetController');

        Route::post('/kontruksi/print', 'InventarisKontruksiController@print')->name("kontruksi.print");
        Route::resource('kontruksi', 'InventarisKontruksiController');

        Route::delete('/hapus-tanah', 'InventarisTanahController@destroys')->name('tanah.destroys');
        Route::delete('/hapus-peralatan', 'InventarisPeralatanController@destroys')->name('peralatan.destroys');
        Route::delete('/hapus-gedung', 'InventarisGedungController@destroys')->name('gedung.destroys');
        Route::delete('/hapus-jalan', 'InventarisJalanController@destroys')->name('jalan.destroys');
        Route::delete('/hapus-asset', 'InventarisAssetController@destroys')->name('asset.destroys');
        Route::delete('/hapus-kontruksi', 'InventarisKontruksiController@destroys')->name('kontruksi.destroys');
    });
});
