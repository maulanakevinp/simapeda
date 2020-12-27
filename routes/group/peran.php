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

    Route::prefix('peran')->group(function () {
        Route::get('/peran-menu-submenu/{peran_menu}', 'PeranMenuSubmenuController@index')->name('peran-menu-submenu.index');
        Route::post('/peran-menu-submenu', 'PeranMenuSubmenuController@store')->name('peran-menu-submenu.store');
        Route::delete('/peran-menu-submenu/{peran_menu_submenu}', 'PeranMenuSubmenuController@destroy')->name('peran-menu-submenu.destroy');

        Route::post('/peran-menu', 'PeranMenuController@store')->name('peran-menu.store');
        Route::delete('/peran-menu/{peran_menu}', 'PeranMenuController@destroy')->name('peran-menu.destroy');
    });
    Route::resource('peran', 'PeranController')->except('show');

});
