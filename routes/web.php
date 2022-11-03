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

Route::get('cadastro_produtos', 'VendasController@cadastro_produtos')->name('cadastro_produtos');

Route::get('cadastro_produtos_submit', 'VendasController@cadastro_produtos_submit')->name('cadastro_produtos_submit');

Route::get('cadastro_vendas', 'VendasController@cadastro_vendas')->name('cadastro_vendas');

Route::get('cadastro_vendas_submit', 'VendasController@cadastro_vendas_submit')->name('cadastro_vendas_submit');

Route::get('cadastro_vendas_submit2', 'VendasController@cadastro_vendas_submit2')->name('cadastro_vendas_submit2');

Route::get('pdf', 'VendasController@gerarPDf')->name('pdf');



