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

    //Alocarção de candidatos
    Route::get('/{id}/sp/vaga/{idvaga}',['uses'=>'JobController@alocarCandidatos', 'as'=>'jobs.sp.candidato']);
    Route::get('/{id}/sp/vaga/{idvaga}/alocar/{idcandidato}',['uses'=>'JobController@alocarNewCandidatos', 'as'=>'jobs.sp.candidato.alocar']);
   Route::get('/{id}/sp/vaga/{idvaga}/desalocar/{idcandidato}',['uses'=>'JobController@desalocarCandidato', 'as'=>'candidato.desalocar']);



    //Editar Job
    Route::get('/editar/{id}',['uses'=>'JobController@geteditar']);
    Route::post('/editar/{id}',['uses'=>'JobController@posteditar', 'as'=>'post.editar.job']);


    //Gera orçamento
    Route::get('/{id}/o','JobController@orcamento');

    //Relatorio Financeiro
    Route::get('/{id}/financeiro',['as'=>'jobs.financeiro','uses'=>'JobController@financeiro']);
    Route::post('/financeiro',['as'=>'jobs.faturamento','uses'=>'JobController@jobfaturamento']);


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

    Route::get('/{id}/detalhes', ['uses'=>'ReembolsoController@detalhesreembolso', 'as'=>'reembolso.detalhes']);
    Route::post('/{id}/detalhes/update', ['uses'=>'ReembolsoController@updateDetalhes', 'as'=>'reembolso.update.detalhes']);

    Route::get('/{id}/checkin', ['uses'=>'ReembolsoController@checkinreembolso', 'as'=>'reembolso.checkin']);
    Route::post('/{id}/checkin/update', ['uses'=>'ReembolsoController@updatecheckin', 'as'=>'reembolso.update.checkin']);

    Route::get('/{id}/quitacao', ['uses'=>'ReembolsoController@quitacaoreembolso', 'as'=>'reembolso.quitacao']);
    Route::post('/{id}/quitacao/update', ['uses'=>'ReembolsoController@updatequitacao', 'as'=>'reembolso.update.quitacao']);

    Route::get('/novo', ['uses'=>'ReembolsoController@novo', 'as'=>'reembolso.novo']);


    Route::get('/lista', ['uses'=>'ReembolsoController@lista', 'as'=>'reembolso.lista']);

    Route::post('/job', ['uses'=>'ReembolsoController@postrembjob']);
    Route::get('/new/job/{id}', ['uses'=>'ReembolsoController@rembjob', 'as'=>'reembolso.job']);


});

Route::group(['prefix'=>'cadastros'], function (){
    Route::get('/', function (){return redirect()->route('cadastros.index');});

    Route::get('/candidato', ['uses'=>'CadastroController@candidato', 'as'=>'cadastros.candidato']);
    Route::get('/candidato/new', ['uses'=>'CadastroController@formnewcandidato','as'=>'form.candidato']);
    Route::post('/candidato/new', ['uses'=>'CadastroController@newcandidato','as'=>'new.candidato']);



    Route::get('/parceiros', ['uses'=>'CadastroController@index', 'as'=>'cadastros.index']);
    Route::post('/parceiros', ['uses'=> 'CadastroController@addParceiro', 'as'=>'cadastro.parceiro']);

    Route::get('/pracas', ['uses'=>'CadastroController@pracas', 'as'=>'pracas']);
    Route::post('/pracas', ['uses'=> 'CadastroController@addPracas', 'as'=>'cadastro.pracas']);

    Route::get('/cadastros/{id}/jobs', ['uses'=>'CadastroController@jobs']);

    Route::get('/usuarios', ['uses'=>'CadastroController@usuarios','as'=>'user']);
    Route::get('/usuarios/new', ['uses'=>'CadastroController@newUser','as'=>'new.user']);
    Route::post('/usuarios/new', ['uses'=>'CadastroController@postNewUser','as'=>'new.user']);


    Route::get('/funcoes', ['uses'=>'CadastroController@funcoesjob','as'=>'funcoes.job']);
    Route::get('/funcoes/newcargo', ['uses'=>'CadastroController@newcargo','as'=>'new.funcoes.job']);
    Route::post('/funcoes/newcargo', ['uses'=>'CadastroController@postnewcargo','as'=>'new.funcoes.job']);






});

Route::group(['prefix'=>'parceiros'], function (){
    Route::get('/{id}/jobs', ['uses'=> 'CadastroController@findJobParceiro']);

});


