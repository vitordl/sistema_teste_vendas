<?php

use App\Http\Controllers\VendasController;
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

Route::get('vendas_salvar', 'VendasController@vendas_salvar')->name('vendas_salvar');

Route::get('vendas_controle', 'VendasController@vendas_controle')->name('vendas_controle');

Route::get('vendas_remover/{id?}', 'VendasController@vendas_remover')->name('vendas_remover');

Route::get('relatorio_vendas', 'VendasController@relatorio_vendas')->name('relatorio_vendas');

Route::get('relatorio_produtos', 'VendasController@relatorio_produtos')->name('relatorio_produtos');

Route::get('pdf_vendas', 'VendasController@gerar_pdf_vendas')->name('pdf_vendas');

Route::get('pdf_produtos', 'VendasController@gerar_pdf_produtos')->name('pdf_produtos');


