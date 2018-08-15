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

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function(){

	Route::get('/', function(){
		return 'Dashboard';
	});

	Route::get('/usuarios', function(){
		return 'uauarios';
	});

});

Route::group(['namespace' => 'Site'], function(){

    Route::get('/', 'SiteController@index');

    Route::get('/contato', 'SiteController@contato');

    Route::get('/categoria/{id}', 'SiteController@categoria');

    Route::get('/categoria2/{id?}', 'SiteController@categoriaOp');

});


Route::get('/painel/produtos/testes','Painel\ProdutoController@testes');

Route::resource('/painel/produtos','Painel\ProdutoController');



//Route::resource('/painel/produtos','Painel\ProdutoController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
