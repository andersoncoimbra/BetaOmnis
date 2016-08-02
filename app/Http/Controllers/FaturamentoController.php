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
        //dd(\Auth::user()->name);
        $faturamentos = Faturamento::orderby('id', 'DESC')->get();
        // dd($faturamento);
        return view('faturamento', ['faturamentos'=>$faturamentos]);
    }

    public function postIndex(Request $request)
    {
        //dd(date('Y-m-d', strtotime(str_replace('/','-',$request->datafaturamento))));
        $faturamento = new Faturamento();

        $datafaturamento = date('Y-m-d', strtotime(str_replace('/','-',$request->datafaturamento)));

        $faturamento->parceiro = $request->parceiro;
        $faturamento->job = $request->job;
        $faturamento->valor = $request->valor;
        $faturamento->status = 'Aberto';
        $faturamento->lastuser = \Auth::user()->name;
        $faturamento->obs = $request->obs;
        $faturamento->datafaturamento = $datafaturamento;


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

    public function postNf($id, Request $request)
    {
        $faturamento = Faturamento::find($id);

        $faturamento->nf = $request->nf;
        $faturamento->valorfaturado = $request->valorfaturado;
        $faturamento->valorliquido = $request->valorliquido;
        $faturamento->data = date('Y-m-d', strtotime(str_replace('/','-',$request->data)));
        $faturamento->obs = $request->obs;
        $faturamento->lastuser = \Auth::user()->name;
        $faturamento->status = "Faturado";

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
        $faturamento->datapagamento = date('Y-m-d', strtotime(str_replace('/','-',$request->data)));
        $faturamento->obs = $request->obs;
        $faturamento->status = 'Quitado';
        $faturamento->save();

        return redirect()->route('faturamento.index');
    }

}

