<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'/faturamento'], function (){
    Route::get('/', ['uses'=>'FaturamentoController@getIndex', 'as'=>'faturamento.index']);
    Route::post('/', ['uses'=>'FaturamentoController@postIndex', 'as'=>'faturamento.index']);

    Route::get('/{id}/detalhes', ['uses'=>'FaturamentoController@getDetalhes', 'as'=>'faturamento.detalhes']);
    Route::get('/{id}/detalhes', ['uses'=>'FaturamentoController@postDetalhes', 'as'=>'faturamento.detalhes']);


});

Route::group(['prefix'=>'reembolso'], function (){
    Route::get('/', ['uses'=>'ReembolsoController@getIndex', 'as'=>'reembolso.index']);

    Route::post('/', ['uses'=>'ReembolsoController@postIndex', 'as'=>'reembolso.index']);

    Route::get('/lista', ['uses'=>'ReembolsoController@lista', 'as'=>'reembolso.lista']);

});
