<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Funcoes;
use App\Job;
use App\Praca;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Http\Requests;
use App\Parceiro;

class CadastroController extends Controller
{
    public function __construct()
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
        ]);

        $parceiro = new Parceiro();
        $parceiro->nome = $request->nome;
        $parceiro->cnpj = $request->cnpj;
        $parceiro->save();


        return redirect()->route('cadastros.index');
    }

    public function addPracasajax(Request $request)
    {
        $parceiro = new Parceiro();
        $parceiro->nome = $request->nome;
        $parceiro->cnpj = $request->cnpj;
        $parceiro->save();

        return "<option value={$parceiro->id}>{$parceiro->nome}</opttion>";
    }
    public function pracas()
    {
        $pracas = Praca::all();
        return view('forms.cadastros.pracas',['pracas'=>$pracas]);
    }

    public function praca($id)
    {
        $jobs = Praca::find($id)->jobs()->get();
        return view('list.listjobscadastro', ['jobs'=>$jobs]);
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

    public function usuarios()
    {
        $users = User::all();

        return view('usuarios', ['users'=>$users]);

    }

    public function newUser()
    {
        return view('forms.cadastros.addUser');
    }
    public function postNewUser(Request $request)
    {
       // dd($request);
        $user = new User();
        $user->name = $request->name;
        $user->email= $request->email;

        if($request->password == $request->password_confirmation)
        {
            $user->password = Hash::make($request->password);
        }else
        {
            return 'Algo deu muito errado';
        }

        $user->save();

        return redirect()->route('user');
    }

    public function candidato()
    {
        $canditato = Candidato::all();
        return view('candidato',['candidatos'=>$canditato]);
    }

    public function formnewcandidato()
    {
        return  view('forms.cadastros.cadcandidato');
    }

    public function newcandidato(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|min:3',
            'email' => 'required|unique:candidatos'
        ]);


        $candidato = new Candidato();
        $candidato->nome = $request->nome;
        $candidato->email = $request->email;
        $candidato->datanascimento = date('Y-m-d', strtotime(str_replace('/','-',$request->datanascimento)));
        $candidato->telefone = $request->telefone;
        $candidato->sexo = $request->sexo;

        $candidato->save();

        return redirect()->route('cadastros.candidato');


    }

    public function funcoesjob()
    {
        $funcoes = Funcoes::all();
        return view('funcoes',['funcoes'=>$funcoes]);
    }

    public function newcargo()
    {
        return view('forms.cadastros.formaddfuncao');
    }

    public function postnewcargo(Request $request)
    {
       $funcao = new Funcoes();
        $funcao->nome = $request->nome;
        $funcao->save();

        return redirect()->route('funcoes.job');
    }
}
