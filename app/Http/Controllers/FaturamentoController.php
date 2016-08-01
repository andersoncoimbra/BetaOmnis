<?php

namespace App\Http\Controllers;

use App\Faturamento;
use Illuminate\Http\Request;

use App\Http\Requests;

class FaturamentoController extends Controller
{
    public function getIndex()
    {
        $faturamentos = Faturamento::all();
       // dd($faturamento);
        return view('faturamento', ['faturamentos'=>$faturamentos]);
    }

    public function postIndex(Request $request)
    {
        $faturamento = new Faturamento();
        $faturamento->parceiro = $request->parceiro;
        $faturamento->job = $request->job;
        $faturamento->valor = $request->valor;
        //$faturamento->obs = $request->obs ;
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
        dd($id);
    }

    public function getNf($id, Request $request){

        $faturamento = Faturamento::find($id);
        return view('forms.faturamento.nf',['faturamento'=>$faturamento]);
    }

    public function postNf($id, Request $request){

        dd($request);
    }

    public function getQuitacao($id,Request $request){

        $faturamento = Faturamento::find($id);
        return view('forms.faturamento.quitacao',['faturamento'=>$faturamento]);
    }
    public function postQuitacao($id,Request $request)
    {
        dd($id);
    }

}

