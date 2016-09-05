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

Route::get('/', 'Homecontroller@index');

//Rotas para os Jobs
Route::group(['prefix'=>'jobs'], function () {
    Route::get('/', ['uses'=>'JobController@index', 'as'=>'lista.jobs']);
    Route::post('/', 'JobController@post');
    Route::get('/novo', 'JobController@novo');
    //Detalhes Job
    Route::get('/{id}', ['uses'=>'JobController@detalhesjob', 'as'=>'detalhes.job']);
    //Detalhes e adição de extras de vaga
    Route::get('/{id}/sp',['uses'=>'JobController@solicitapessoal', 'as'=>'jobs.sp']);
    Route::post('/{id}/sp','JobController@postsolicitapessoal');
    Route::get('/{id}/sp/{evg}',['as'=>'get.extras','uses'=>'JobController@detalhesVaga']);
    Route::post('/{id}/sp/{evg}',['uses'=>'JobController@postExtraVaga']);

    //Gera orçamento
    Route::get('/{id}/o','JobController@orcamento');

    //Relatorio Financeiro
    Route::get('/{id}/financeiro',['as'=>'jobs.financeiro','uses'=>'JobController@financeiro']);

});

Route::group(['prefix'=>'/faturamento'], function (){
    Route::get('/', ['uses'=>'FaturamentoController@getIndex', 'as'=>'faturamento.index']);
    Route::post('/', ['uses'=>'FaturamentoController@postIndex', 'as'=>'faturamento.index']);

    Route::get('/{id}/detalhes', ['uses'=>'FaturamentoController@getDetalhes', 'as'=>'faturamento.detalhes']);
    Route::post('/{id}/detalhes', ['uses'=>'FaturamentoController@postDetalhes', 'as'=>'faturamento.detalhes']);

    Route::get('/{id}/nf', ['uses'=>'FaturamentoController@getNf', 'as'=>'faturamento.nf']);
    Route::post('/{id}/nf', ['uses'=>'FaturamentoController@postNf', 'as'=>'faturamento.nf']);

    Route::get('/{id}/quitacao', ['uses'=>'FaturamentoController@getQuitacao', 'as'=>'faturamento.quitacao']);
    Route::post('/{id}/quitacao', ['uses'=>'FaturamentoController@postQuitacao', 'as'=>'faturamento.quitacao']);

    Route::get('/excel', ['uses'=>'ExcelController@getExport','as'=>'faturamento.export.excel']);

});

Route::group(['prefix'=>'reembolso'], function (){
    Route::get('/', ['uses'=>'ReembolsoController@getIndex', 'as'=>'reembolso.index']);

    Route::post('/', ['uses'=>'ReembolsoController@postIndex', 'as'=>'reembolso.index']);

    Route::get('/lista', ['uses'=>'ReembolsoController@lista', 'as'=>'reembolso.lista']);

});

Route::group(['prefix'=>'cadastros'], function (){
    Route::get('/', function (){return redirect()->route('cadastros.index');});

    Route::get('/parceiros', ['uses'=>'CadastroController@index', 'as'=>'cadastros.index']);
    Route::post('/parceiros', ['uses'=> 'CadastroController@addParceiro', 'as'=>'cadastro.parceiro']);

    Route::get('/pracas', ['uses'=>'CadastroController@pracas', 'as'=>'pracas']);
    Route::post('/pracas', ['uses'=> 'CadastroController@addPracas', 'as'=>'cadastro.pracas']);

    Route::get('/cadastros/{id}/jobs', ['uses'=>'CadastroController@jobs']);

});

Route::group(['prefix'=>'parceiros'], function (){
    Route::get('/{id}/jobs', ['uses'=> 'CadastroController@findJobParceiro']);

});

Route::group(['prefix'=>'pracas'], function (){
    Route::get('/{id}/jobs', ['uses'=> 'CadastroController@praca']);

});