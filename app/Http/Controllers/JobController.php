<?php

namespace App\Http\Controllers;

use App\ExtrasVagasJob;
use App\Faturamento;
use App\Candidato;
use App\Funcoes;
use App\Job;
use App\Parceiro;
use App\Praca;
use App\VagasJob;
use Illuminate\Http\Request;

use App\Http\Requests;

class JobController extends Controller
{
    //
    private $parceiro = ['','Parceiro 1','Parceiro 2','Parceiro 3','Parceiro 4','Parceiro 5','Parceiro 6','Parceiro 7','Parceiro 8','Parceiro 10','Parceiro 13','Parceiro 32','Parceiro 33','Parceiro 34','Parceiro 31','Parceiro 314','Parceiro 34','Parceiro 35','Parceiro 36','Parceiro 37','Parceiro 15','Parceiro 26','Parceiro 47','Parceiro 58','Parceiro 89'];
    private $status = ['','Orçamento', 'Stand by', 'Exercução'];
    private $praca;
    private $cargo = ['','cargo 1','cargo 2','cargo 3','cargo 4','cargo 5','cargo 6','cargo 7','cargo 8','cargo 9','cargo 2','cargo 3','cargo 4','cargo 5','cargo 6','cargo 7','cargo 8','cargo 9','cargo 2','cargo 3','cargo 4','cargo 5','cargo 6','cargo 7','cargo 8','cargo 9'];
    private $regime = ['','Temporario', 'Prazo Inderteminado', 'Menor Aprendiz', 'CLT', 'Freelancer', 'Outros'];
    private $contratante = ['','Omnis', 'Parceiro', 'Outro'];
    private $periodo = ['', 'Diario', 'Mensal','Unico'];
    private $tipoajuda = ['','Ajuda de custo', 'Pacote de dados', 'Vale transporte'];
    private $estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs   = Job::orderBy('id','DESC')->get();
        $parceiros = Parceiro::all();
        $ds     = $this->status;
        $dp     = $this->parceiro;
        $p      = Praca::all();

        //dd($p);
        //dd($p);

        return view('jobs', ['jobs'=> $jobs, 'ds'=> $ds, 'parceiros'=>$parceiros, 'p'=>$p]);
    }

    public function novo()
    {
        $parceiros = Parceiro::all();
        $ds     = $this->status;
        $dp     = $this->parceiro;
        $p      = Praca::all();

        return view('forms.job.addJob', ['ds'=> $ds, 'parceiros'=>$parceiros, 'p'=>$p, 'estados'=>$this->estados]);
    }

    public function post(Request $request)
    {
       // dd($request);
        $this->gravar(
            $request->nomejob,
            $request->parceiro,
            $request->praca,
            $request->codnome,
            $request->codpar,
            $request->codemail,
            $request->nf,
            $request->codetele,
            $request->inicio,
            $request->fim,
            $request->status,
            $request->valor,
            $request->custo
        );
       // $jobs = Job::all();

        return redirect('/jobs/');
    }

    public function geteditar($id)
    {
        $parceiros = Parceiro::all();
        $ds     = $this->status;
        $dp     = $this->parceiro;
        $p      = Praca::all();
        $job    = Job::find($id);


        return view('forms.job.editarjob', ['job'=>$job,'ds'=> $ds, 'parceiros'=>$parceiros, 'p'=>$p, 'estados'=>$this->estados]);

    }
    public function posteditar($id,Request $request){

        //dd($request);
        $job = Job::find($id);

        $job->nomeJob = $request->nomeJob;
        $job->parceiro = $request->parceiro;
        $job->praca = $request->praca;
        $job->codnome = $request->codnome;
        $job->codemail = $request->codemail;
        $job->nf = $request->nf;
        $job->codtele = $request->codtele;
        $job->inicio = date('Y-m-d', strtotime(str_replace('/','-',$request->inicio)));
        $job->fim = date('Y-m-d', strtotime(str_replace('/','-',$request->fim)));

        if( $request->status > 0) {
            $job->status = $request->status;
        }
        $job->valor = $request->valor;
        $job->custo = $request->custo;

        $job->save();

        return redirect()->route('detalhes.job', $id);
    }


    public function detalhesjob($id)
    {
        $dp = $this->cargo;
        $ds = $this->status;
        $p  = $this->praca;
        $tipo   = $this->tipoajuda;

        //$vagas = VagasJob::all();

        $job = Job::find($id);

        $vj= $job->vagaJobs;

        return view('layouts.detalhesjob', ['job' => $job, 'tipo'=>$tipo, 'dp'=> $dp, 'ds'=>$ds, 'p'=>$p, 'vj' => $vj]);

    }

    public function solicitapessoal($idjob)
    {
        $job = Job::find($idjob);
        $cargos = Funcoes::all();
        $nomejob = $job->nomeJob;
        $vj = $job->vagaJobs;
        $c  = $this->cargo;
        $ct = $this->contratante;
        $per = $this->periodo;
        return view('layouts.vagasjob', ['job'=>$job, 'cargos'=>$cargos,'id'=> $idjob, 'per'=>$per, 'vj'=>$vj, 'nomejob'=>$nomejob, 'c'=>$c, 'ct'=>$ct, 'r'=>$this->regime]);
    }

    public function postsolicitapessoal(Request $request, $idjob)
    {
        //dd($request);
        $nomejob = Job::find($idjob)->nomeJob;
        $per = $this->periodo;
        $c  = $this->cargo;
        $rq = $request;

        $vaga = new VagasJob();
        $vaga->cargo = $request->cargo;
        $vaga->regime = $request->regime;
        $vaga->contratante = $request->contratante;
        $vaga->quantidade = $request->qtd;
        $vaga->periodo = $request->periodo;
        $vaga->valor = $request->valor;
        $vaga->custo = $request->custo;
        $vaga->id_job = $idjob;
        $vaga->save();

        $vj = VagasJob::all()->where('id_job', $idjob);
        //return view('layouts.vagasjob', ['id'=> $idjob,'rq'=>$rq, 'per'=>$per, 'vj'=>$vj, 'nomejob'=>$nomejob, 'c'=>$c, 'r'=>$r, 'ct'=>$ct]);
        return redirect('/jobs/'.$idjob);
    }

    public function detalhesVaga($id, $idvj){
        $vj = VagasJob::find($idvj);
        if($vj != null){
            if($vj->id_job == $id)
            {
                $job = Job::find($id);
                $evj = $vj->extras;
                $r = $this->regime;
                $ct = $this->contratante;
                $dp = $this->cargo;
                $p = $this->praca;
                $per = $this->periodo;
                $tipo = $this->tipoajuda;
                return view('layouts.detalhesvaga', ['id' => $id, 'job' => $job, 'vj' => $vj, 'dp' => $dp, 'p' => $p, 'r' => $r, 'ct' => $ct, 'per' => $per, 'evj' => $evj, 'tipo' => $tipo]);
            }
            else
            {
                return view('errors.erro');

            }
        }
        else
        {
            return view('errors.erro');
        }
    }

    public function postExtraVaga(Request $request, $id, $idvj)
    {
        $vj = VagasJob::find($idvj);
        if($vj != null)
        {
            if($vj->id_job == $id)
            {
                //dd($request);
                $evj = new ExtrasVagasJob();
                $evj->tipo = $request->tipo;
                $evj->quantidade = $request->qtd;
                $evj->periodo = $request->per;
                $evj->valor = $request->var;
                $evj->custo = $request->custo;
                $evj->id_vaga_job = $idvj;
                $evj->save();

                $param = ['id'=>$id,'evg'=>$idvj];

                return redirect()->route('get.extras',$param);
            }
            else
            {
                return view('errors.erro');
            }
        }
        else
        {
            //  return view('errors.erro');
        }

    }

    public function orcamento($id)
    {
        $job = Job::find($id);
        $p = $this->parceiro;
        $pc = $this->praca;
        $dp = $this->cargo;
        // $vj = VagasJob::all()->where('id_job', $id)->sum('valor');
        $vj = VagasJob::all()->where('id_job', $id);

        return view('layouts.jobs.orcamento', ['id'=>$id, "job"=>$job, 'p'=>$p, 'pc'=>$pc, 'vj'=>$vj, 'dp'=>$dp]);
    }

    public function financeiro($id)
    {
        $job = Job::find($id);

        return view('layouts.jobs.financeiro', ['id'=>$id,'job'=>$job]);
    }

    protected function gravar($nomejob, $parceiro, $praca, $codnome, $codnome, $codmail, $nf, $codtele, $inicio, $fim, $status, $valor, $custo)
    {
        $job = new Job();

        $job->nomeJob = $nomejob;
        $job->parceiro = $parceiro;
        $job->praca = $praca;
        $job->codnome = $codnome;
        $job->codemail = $codmail;
        $job->nf = $nf;
        $job->codtele = $codtele;
        $job->inicio = date('Y-m-d', strtotime(str_replace('/','-',$inicio)));
        $job->fim = date('Y-m-d', strtotime(str_replace('/','-',$fim)));
        $job->status = $status;
        $job->valor = $valor;
        $job->custo = $custo;

        $job->save();
    }

    public function alocarCandidatos($id, $idvaga)
    {

        $job = Job::find($id);
        $vaga = $job->vagajobs->find($idvaga);
        $candidatosjob = $job->vagaJobs()->find($idvaga)->candidatos()->get();
        $cargo = Funcoes::all();
        $candidatos = Candidato::all();

        return view('layouts.jobs.alocarcandidatos',
            [

                'nomejob'=> $job->nomeJob,
                'id'=>$id,
                'idvaga'=>$idvaga,
                'vagajob'=>$vaga,
                'cargo'=>$cargo,
                'r'=> $this->regime,
                'ct'=>$this->contratante,
                'per'=>$this->periodo,
                'candidatos'=>$candidatos,
                'candidatosjob'=>$candidatosjob
            ]);
    }

    public function alocarNewCandidatos($id, $idvaga, $idcandidato)
    {
        $job = Job::find($id);
        $job->vagaJobs()->find($idvaga)->candidatos()->attach($idcandidato);
        return redirect()->route('jobs.sp.candidato', ['id'=>$id, 'idvaga'=>$idvaga]);
    }

    public function desalocarCandidato($id, $idvaga, $idcandidato)
    {
        $job = Job::find($id);
        $job->vagaJobs()->find($idvaga)->candidatos()->detach($idcandidato);
        //dd($job->vagaJobs()->find($idvaga)->candidatos()->get);

        return redirect()->route('jobs.sp.candidato', ['id'=>$id, 'idvaga'=>$idvaga]);
    }

    public function jobfaturamento(Request $request)
    {
        $faturamento = new Faturamento();
        $faturamento->parceiro = $request->parceiro;
        $faturamento->job = $request->job;
        $faturamento->valor = $request->valor;
        $faturamento->job_id = $request->id_job;
        $faturamento->status = "Aberto";
        $faturamento->lastuser = \Auth::user()->name;
        //$faturamento->atualizador= \Auth::user()->name;


        $faturamento->obs = $request->obs ;
        // dd($faturamento);
        $faturamento->save();

        return redirect()->route('jobs.financeiro', ['id'=>$request->id_job]);

    }
}
