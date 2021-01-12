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

Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/masuk', 'AuthController@index')->name('masuk');
    Route::post('/masuk', 'AuthController@masuk');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::post('/keluar', 'AuthController@keluar')->name('keluar');

    Route::get('/pengaturan', 'UserController@pengaturan')->name('pengaturan');
    Route::get('/profil', 'UserController@profil')->name('profil');
    Route::patch('/update-pengaturan/{user}', 'UserController@updatePengaturan')->name('update-pengaturan');
    Route::patch('/update-profil/{user}', 'UserController@updateProfil')->name('update-profil');

    Route::group(['middleware' => ['peran']], function () {
        Route::get('/identitas-desa', 'DesaController@index')->name('identitas-desa');
        Route::patch('/identitas-desa/update-desa/{desa}', 'DesaController@update')->name('update-desa');

        Route::get('/informasi', 'GalleryController@informasi')->name('informasi.index');

        Route::get('/pengaturan-surat', 'PengaturanSuratController@index')->name('pengaturan-surat.index');
        Route::post('/pengaturan-surat', 'PengaturanSuratController@update')->name('pengaturan-surat.update');

        Route::resource('dusun', 'DusunController')->except('show');
        Route::resource('/dusun/detailDusun', 'DetailDusunController')->except('create','edit');

        Route::post('user/reset-password/{user}', 'UserController@reset_password')->name('user.reset-password');
        Route::resource('user', 'UserController')->except('show');
    });
});

Route::get('/{any}', 'ArtikelController@show')->where('any', '.*')->name('artikel.show');
