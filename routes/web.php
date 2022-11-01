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

// Route::get('/', function () {
//     return view('welcome');
// });

// Rota para o login 
Route::get('/', 'VendasController@index')->name('login');
Route::post('login_submit', 'VendasController@login_submit')->name('login_submit');

Route::get('sistema', 'VendasController@sistema')->name('sistema');

Route::get('sair', 'VendasController@deslogar')->name('deslogar');

Route::get('sobre', 'VendasController@sobre')->name('sobre');

Route::get('pdf', 'VendasController@gerarPDf')->name('pdf');

