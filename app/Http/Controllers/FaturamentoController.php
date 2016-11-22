<?php

namespace App\Http\Controllers;

use App\Faturamento;
use Illuminate\Http\Request;

use App\Http\Requests;

class FaturamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
        $faturamentos = Faturamento::orderBy('id','DESC')->get();

        //Dashboard //////////
        $totalquitacao = Faturamento::Where('status','=','Quitado')->sum('valorrecebido');
        $totalfaturado = Faturamento::Where('status','=','Faturado')->sum('valorfaturado');
        $totalreceber = Faturamento::Where('status','=','Aberto')->sum('valor') + $totalfaturado ;


        //Tabela de vencimentos nos ultimos 5 dias//////////
        $now = date('Y-m-d');
        $periodo = date('Y-m-d',mktime(0, 0, 0, date("m"), date("d") - 5, date("Y")));
        $faturasvenc = Faturamento::where('status','=','Faturado')->whereBetween('data',[$periodo,$now])->get();
        ////////////////////////////////////////////////////////////

        return view('faturamento', ['faturamentos'=>$faturamentos, 'totalquitacao'=>$totalquitacao,'totalfaturado'=>$totalfaturado,'totalreceber'=>$totalreceber, 'faturavenc'=>$faturasvenc]);
    }

    public function postIndex(Request $request)
    {
        $faturamento = new Faturamento();
        $faturamento->parceiro = $request->parceiro;
        $faturamento->job = $request->job;
        $faturamento->valor = $request->valor;
        $faturamento->job_id = 0;
        $faturamento->status = "Aberto";
        $faturamento->lastuser = \Auth::user()->name;
        //$faturamento->atualizador= \Auth::user()->name;


        $faturamento->obs = $request->obs ;
        // dd($faturamento);
        $faturamento->save();

        return redirect()->route('faturamento.index');

    }

    public function getDetalhes($id,Request $request){

        $faturamento = Faturamento::find($id);
        return view('forms.faturamento.detalhes',['faturamento'=>$faturamento]);
    }
    public function postDetalhes($id,Request $request)
    {
        $faturamento = Faturamento::find($id);

        $faturamento->parceiro = $request->parceiro;
        $faturamento->job = $request->job;
        $faturamento->valor = str_replace(',','.',$request->valor);
        $faturamento->datafaturamento = date('Y-m-d', strtotime(str_replace('/','-',$request->datafaturamento)));
        $faturamento->obs = $request->obs;
        $faturamento->lastuser = \Auth::user()->name;

        $faturamento->save();

        return redirect()->route('faturamento.index');

    }

    public function getNf($id, Request $request){

        $faturamento = Faturamento::find($id);
        return view('forms.faturamento.nf',['faturamento'=>$faturamento]);
    }

    public function postNf($id, Request $request){

        $faturamento = Faturamento::find($id);

        $faturamento->nf = $request->nf;
        $faturamento->valorfaturado = $request->valorfaturado;
        $faturamento->valorliquido = $request->valorliquido;
        $faturamento->data = date('Y-m-d', strtotime(str_replace('/','-',$request->data)));
        $faturamento->obs = $request->obs;
        $faturamento->lastuser = \Auth::user()->name;
        $faturamento->status = "Faturado";
        $faturamento->iss = $request->iss;
        $faturamento->inss = $request->inss;
        $faturamento->ir = $request->ir;
        $faturamento->csll = $request->csll;
        $faturamento->pis = $request->pis;
        $faturamento->cofins = $request->cofins;

        $faturamento->save();

        return redirect()->route('faturamento.index');
    }

    public function getQuitacao($id,Request $request){

        $faturamento = Faturamento::find($id);
        return view('forms.faturamento.quitacao',['faturamento'=>$faturamento]);
    }
    public function postQuitacao($id,Request $request)
    {
        $faturamento = Faturamento::find($id);

        $faturamento->valorrecebido = str_replace(',','.',$request->valorrecebido);
        $faturamento->datapagamento = date('Y-m-d', strtotime(str_replace('/','-',$request->datapagamento)));
        $faturamento->obs = $request->obs;
        $faturamento->status = 'Quitado';
        $faturamento->lastuser = \Auth::user()->name;
        $faturamento->save();

        return redirect()->route('faturamento.index');
    }

}

