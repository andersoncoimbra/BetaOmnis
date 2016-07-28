<?php

namespace App\Http\Controllers;

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
        $reembolso->data  = $request->data;
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


}
