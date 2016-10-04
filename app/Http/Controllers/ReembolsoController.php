<?php

namespace App\Http\Controllers;

use App\Job;
use App\Reembolso;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReembolsoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {

        //dd($rembolso);
        $reembolsos = Reembolso::orderBy('id','DESC')->get();;

        return view('reembolso', ['reembolsos'=>$reembolsos]);
    }


    public function postIndex(Request $request)
    {
        $reembolso = new Reembolso();
        $reembolso->parceiro  = $request->parceiro;
        $reembolso->job  = $request->job;
        $reembolso->valor  = $request->valor;
        $reembolso->data  =  date('Y-m-d', strtotime(str_replace('/','-',$request->data)));
        $reembolso->fornecedor  = $request->fornecedor;
        $reembolso->identificador  = $request->identificador;
        $reembolso->data_envio  = $request->dataenvio;
        $reembolso->criador = \Auth::user()->name;

        $reembolso->save();

        return redirect()->route('reembolso.index');
    }

    public function detalhesreembolso($id)
    {
        $remb = Reembolso::find($id);
        return view('forms.reembolso.detalhes',['reembolso'=> $remb]);
    }

    public function lista()
    {

        $reembolsos = Reembolso::all();

        return view('list.listreembolso', ['reembolsos'=>$reembolsos]);
    }

    public function updateDetalhes(Request $request, $id)
    {
        $update = Reembolso::find($id);
        $update->parceiro  = $request->parceiro;
        $update->job = $request->job;
        $update->valor = $request->valor;
        $update->data = date('Y-m-d', strtotime(str_replace('/','-',$request->data)));
        $update->obs = $request->obs;
        $update->atualizador = \Auth::user()->name;

        $update->save();

        return redirect()->route('reembolso.index');

    }

    public function checkinreembolso($id)
    {
        $reembolso = Reembolso::find($id);

        return view('forms.reembolso.checkin', ['reembolso'=> $reembolso]);
    }

    public function updatecheckin(Request $request, $id)
    {
        $reembolso = Reembolso::find($id);
        $reembolso->data_envio = $request->data_envio;
        $reembolso->identificador = $request->identificador;
        $reembolso->fornecedor = $request->fornecedor;
        $reembolso->obs = $request->obs;
        $reembolso->atualizador = \Auth::user()->name;

        $reembolso->save();

        return redirect()->route('reembolso.index');
    }

    public function quitacaoreembolso($id)
    {
        $reembolso = Reembolso::find($id);

        return view('forms.reembolso.compensar', ['reembolso'=> $reembolso]);
    }

    public function updatequitacao(Request $request, $id)
    {
        $reembolso = Reembolso::find($id);
        $reembolso->recibo = $request->recibo;
        $reembolso->data_pagamento = date('Y-m-d', strtotime(str_replace('/','-',$request->data_pagamento)));

        $reembolso->obs = $request->obs;
        if($request->recibo >= $reembolso->valor){
            $reembolso->status = 'Quitado';
        }
        $reembolso->atualizador = \Auth::user()->name;

        $reembolso->save();

        return redirect()->route('reembolso.index');

    }

    public function novo()
    {

       return view('forms.reembolso.addReembolso');
    }

    public function rembjob($id)
    {
        $job = Job::find($id);

        return view('forms.reembolso.addReembolsoJob', ['job'=>$job]);
    }

    public function postrembjob(Request $request)
    {
        $reembolso = new Reembolso();
        $reembolso->job  = $request->job;
        $reembolso->job_id  = $request->job_id;
        $reembolso->parceiro  = $request->parceiro;
        $reembolso->valor  = $request->valor;
        $reembolso->data  = date('Y-m-d', strtotime(str_replace('/','-',$request->data)));
        $reembolso->obs  = $request->obs;
        $reembolso->criador = \Auth::user()->name;

        $reembolso->atualizador = \Auth::user()->name;

        $reembolso->save();

        return redirect()->route('jobs.financeiro', $request->job_id);
    }


}
