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

// Rotas para os livros
Route::get('/', 'LivroController@index');
Route::resource('livros', 'LivroController');

// Rotas para o contato
Route::get('contato', 'ContatoController@index');
Route::post('contato', 'ContatoController@enviaEmail');