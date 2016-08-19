<?php

namespace App\Http\Controllers;

use App\Job;
use App\Praca;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Parceiro;

class CadastroController extends Controller
{
    public function __destruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parceiros = Parceiro::all();

        return view('cadastros', ['parceiro'=>$parceiros]);
    }

    public function addParceiro(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:3',
            'cnpj' => 'required|min:14|max:18'
        ]);

        $parceiro = new Parceiro();
        $parceiro->nome = $request->nome;
        $parceiro->cnpj = $request->cnpj;
        $parceiro->save();


        return redirect()->route('cadastros.index');
    }

    public function pracas()
    {
        $pracas = Praca::all();
        return view('forms.cadastros.pracas',['pracas'=>$pracas]);
    }

    public function addPracas(Request $request)
    {
        $pracas = new Praca();

        $pracas->nome = $request->nome;
        $pracas->estado = $request->estado;

        $pracas->save();

        return redirect()->route('pracas');
    }

    public function jobs($id)
    {
        $jobs = Praca::find($id)->jobs()->get();

        return view('list.listjobscadastro', ['jobs'=>$jobs]);

    }

    public function findJobParceiro($id)
    {
        $jobs = Parceiro::find($id)->jobs()->get();
        return view('list.cadastros.listJobParceiro', ['jobs'=>$jobs]);
    }
}
