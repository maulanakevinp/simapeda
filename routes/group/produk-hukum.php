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

Route::get('/produk/hukum', 'HomeController@produk_hukum')->name('produk-hukum');

Route::group(['middleware' => ['web', 'auth', 'peran']], function () {

    Route::prefix('produk-hukum')->group(function () {
        Route::get('/', function () {return redirect()->route('sk-kades.index');});

        Route::prefix('sk-kades')->group(function () {
            Route::get('/{sk_kades}/aktifkan', 'SkKadesController@aktifkan')->name('sk-kades.aktifkan');
            Route::get('/{sk_kades}/nonaktifkan', 'SkKadesController@nonaktifkan')->name('sk-kades.nonaktifkan');
            Route::get('/{sk_kades}/download', 'SkKadesController@download')->name('sk-kades.download');
            Route::post('/print', 'SkKadesController@print')->name('sk-kades.print');
        });
        Route::resource('sk-kades', 'SkKadesController');

        Route::prefix('perdes')->group(function () {
            Route::get('/{perdes}/aktifkan', 'PerdesController@aktifkan')->name('perdes.aktifkan');
            Route::get('/{perdes}/nonaktifkan', 'PerdesController@nonaktifkan')->name('perdes.nonaktifkan');
            Route::get('/{perdes}/download', 'PerdesController@download')->name('perdes.download');
            Route::post('/print', 'PerdesController@print')->name('perdes.print');
        });
        Route::resource('perdes', 'PerdesController');

        Route::prefix('perkades')->group(function () {
            Route::get('/{perkades}/aktifkan', 'PerkadesController@aktifkan')->name('perkades.aktifkan');
            Route::get('/{perkades}/nonaktifkan', 'PerkadesController@nonaktifkan')->name('perkades.nonaktifkan');
            Route::get('/{perkades}/download', 'PerkadesController@download')->name('perkades.download');
            Route::post('/print', 'PerkadesController@print')->name('perkades.print');
        });
        Route::resource('perkades', 'PerkadesController');
    });

    Route::delete('/hapus-sk-kades', 'SkKadesController@destroys')->name('sk-kades.destroys');
    Route::delete('/hapus-perdes', 'PerdesController@destroys')->name('perdes.destroys');
    Route::delete('/hapus-perkades', 'PerkadesController@destroys')->name('perkades.destroys');

});
