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

Route::get('/{conta}', 'ContasController@show')->name('conta.show');
Route::get('/{conta}/transferir', 'TransferenciaController@create')->name('transferencia.create');
Route::post('/{conta}/transferir', 'TransferenciaController@store')->name('transferencia.store');
