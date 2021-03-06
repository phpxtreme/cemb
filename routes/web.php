<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return !Auth::check() ? view('page.auth') : view('page.home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Routes for unauthenticated users
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'guest'], function () {
    Route::post('login', 'Auth\LoginController@login')
        ->name('login');
});

/*
|--------------------------------------------------------------------------
| Routes for authenticated users
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

    // Contratos
    Route::get('contratos', 'ContratoController@view')
        ->name('contratos');

    Route::post('contratos/proveedor/grupos', 'ContratoController@getProveedorGrupos');
    Route::post('contratos/proveedor/grupo/items', 'ContratoController@getGrupoItems');
    Route::post('contratos/proveedor/grupo/detalles', 'ContratoController@getGrupoDetalles');

    // Facturas
    Route::get('facturas', 'FacturaController@view')
        ->name('facturas');
});