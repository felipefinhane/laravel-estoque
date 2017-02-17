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


Route::get('/', function(){
    return '<h1>Primeira lógica com Laravel</h1>';
});


Route::get('/produtos', 'ProdutoController@lista');
//URL COM PARAMETRO ID
Route::get('/produtos/detalhes/{idProduto?}', 'ProdutoController@detalhes')->where('idProduto', '[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
//JSON
Route::get('/produtos/json', 'ProdutoController@listaJson');