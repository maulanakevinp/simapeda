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
Route::get('/panduan', 'HomeController@panduan')->name('panduan');

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

    Route::get('/identitas-desa', 'DesaController@index')->name('identitas-desa');
    Route::patch('/update-desa/{desa}', 'DesaController@update')->name('update-desa');

    Route::get('/tambah-slider', 'GalleryController@create')->name('slider.create');
    Route::get('/slider', 'GalleryController@indexSlider')->name('slider.index');

    Route::get('/tambah-dusun', 'DusunController@create')->name('dusun.create');
    Route::resource('dusun', 'DusunController')->except('create','show');
    Route::resource('detailDusun', 'DetailDusunController')->except('create','edit');

    Route::get('/database', 'DatabaseController@index')->name('database.index');
    Route::get('/database/backup', 'DatabaseController@backup')->name('database.backup');
    Route::post('/database/restore', 'DatabaseController@restore')->name('database.restore');

    Route::get('/folder/backup', 'DatabaseController@folder_backup')->name('folder.backup');
    Route::post('/folder/restore', 'DatabaseController@folder_restore')->name('folder.restore');
});

Route::get('/{any}', 'ArtikelController@show')->where('any', '.*')->name('artikel.show');
