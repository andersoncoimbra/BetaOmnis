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
        $reembolsos = Reembolso::all();

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

        $reembolso->save();

        return redirect()->route('reembolso.index');
    }

    public function lista()
    {

        $reembolsos = Reembolso::all();

        return view('list.listreembolso', ['reembolsos'=>$reembolsos]);
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
        $reembolso->save();

        return redirect()->route('jobs.financeiro', $request->job_id);
    }


}
