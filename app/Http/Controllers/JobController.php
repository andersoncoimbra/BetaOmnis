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
    private $status = ['','Orçamento', 'Stand by', 'Execução','Pendente', 'Finalizado', 'Cancelado'];
    private $tipojob = ['Normal','Tipo Pai', 'Tipo Filho'];
    private $praca;
    private $cargo = ['','cargo 1','cargo 2','cargo 3','cargo 4','cargo 5','cargo 6','cargo 7','cargo 8','cargo 9','cargo 2','cargo 3','cargo 4','cargo 5','cargo 6','cargo 7','cargo 8','cargo 9','cargo 2','cargo 3','cargo 4','cargo 5','cargo 6','cargo 7','cargo 8','cargo 9'];
    private $regime = ['','Temporario', 'Prazo Inderteminado', 'Menor Aprendiz', 'CLT', 'Freelancer', 'Outros'];
    private $contratante = ['','Omnis', 'Parceiro', 'Outro'];
    private $periodo = ['', 'Mensal', 'Diario','Unico'];
    private $tipoajuda = ['','Ajuda de custo', 'Pacote de dados', 'Vale transporte'];
    private $estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs   = Job::orderBy('id','DESC')->where('tipodejob','<>', 2)->get();
        $parceiros = Parceiro::all();
        $ds     = $this->status;

        $p      = Praca::all();

       return view('jobs', ['jobs'=> $jobs, 'ds'=> $ds, 'parceiros'=>$parceiros, 'p'=>$p]);
    }

    public function novo()
    {
        $parceiros = Parceiro::all();
        $ds     = $this->status;
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
            $request->tipofaturamento,
            $request->codetele,
            $request->inicio,
            $request->fim,
            $request->status,
            $request->valor,
            $request->custo,
            $request->tipodejob
        );
       // $jobs = Job::all();

        return redirect('/jobs/');
    }

    public function geteditar($id)
    {
        $parceiros = Parceiro::all();
        $ds     = $this->status;
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
        $job->tipofaturamento = $request->tipofaturamento;
        $job->codtele = $request->codtele;
        $job->finacomp = $request->finacomp;
        $job->inicio = date('Y-m-d', strtotime(str_replace('/','-',$request->inicio)));
        $job->fim = date('Y-m-d', strtotime(str_replace('/','-',$request->fim)));

        if( $request->status > 0) {
            $job->status = $request->status;
        }


        $job->save();

        return redirect()->route('detalhes.job', $id);
    }

    public function getnovojobfilho($id)
    {
        $parceiros = Parceiro::all();
        $ds     = $this->status;
        $p      = Praca::all();
        $job    = Job::find($id);


        return view('forms.job.modal.novojobfilho', ['job'=>$job,'ds'=> $ds, 'parceiros'=>$parceiros, 'p'=>$p, 'estados'=>$this->estados]);

    }

    public function postnovojobfilho($id, Request $request)
    {
        //dd($request);
        $job = new Job();

        $job->nomeJob = $request->nomeJob;
        $job->parceiro = $request->parceiro;
        $job->praca = $request->praca;
        $job->codnome = $request->codnome;
        $job->codemail = $request->codemail;
        $job->tipofaturamento = $request->tipofaturamento;
        $job->codtele = $request->codtele;
        $job->inicio = date('Y-m-d', strtotime(str_replace('/','-',$request->inicio)));
        $job->fim = date('Y-m-d', strtotime(str_replace('/','-',$request->fim)));

        if( $request->status > 0) {
            $job->status = $request->status;
        }
        $job->tipodejob = 2;
        $job->jobpai = $id;

        $job->save();

        return redirect()->route('detalhes.job', $id);
    }


    public function detalhesjob($id)
    {
        $dp = $this->cargo;
        $ds = $this->status;
        $p  = $this->praca;
        $tipo   = $this->tipoajuda;
        $jf = Job::where('jobpai',$id)->get();

        //$vagas = VagasJob::all();

        $job = Job::find($id);

        $vj= $job->vagaJobs;

        return view('layouts.detalhesjob', ['jf'=> $jf, 'job' => $job, 'tipo'=>$tipo, 'dp'=> $dp, 'ds'=>$ds, 'p'=>$p, 'vj' => $vj, 'tipodejob'=>$this->tipojob]);

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

    public function geteditarvaga($id, $evg)
    {
        $vagajob = VagasJob::find($evg);
        $cargos = Funcoes::all();

        return view('forms.job.editarvagajob', ['id'=>$id, 'vagajob'=>$vagajob, 'cargos'=>$cargos,'r'=>$this->regime]);
    }

    public function posteditarvaga(Request $request, $id, $evg)
    {
        $vagajob = VagasJob::find($evg);
        $vagajob->cargo = $request->cargo;
        $vagajob->regime = $request->regime;
        $vagajob->contratante = $request->contratante;
        $vagajob->quantidade = $request->quantidade;
        $vagajob->periodo = $request->periodo;
        $vagajob->valor = $request->valor;
        $vagajob->custo = $request->custo;
        $vagajob->id_job = $id;
        $vagajob->save();


        $param = ['id'=>$id,'evg'=>$evg];

       return redirect()->route('get.extras',$param);
    }

    public function orcamento($id)
    {
        $job = Job::find($id);

        $pc = $this->praca;
        $dp = $this->cargo;
        // $vj = VagasJob::all()->where('id_job', $id)->sum('valor');
        $vj = VagasJob::all()->where('id_job', $id);

        $jf = Job::where('jobpai',$id)->where('finacomp', 1)->get();

        return view('layouts.jobs.orcamento', ['id'=>$id, "job"=>$job, 'pc'=>$pc, 'vj'=>$vj, 'dp'=>$dp, 'tipo'=>$this->tipoajuda, 'jf'=>$jf]);
    }

    public function taxacoligada(Request $request, $id)
    {
        $job = Job::find($id);
      // $job->valor = $request->valor;
       // $job->custo = $request->custo;
        $job->taxacoligada = $request->valortaxacoligada;
        $job->save();

        return redirect()->route('orcamentojob', ['id'=>$id]);
    }

    public function imposto(Request $request, $id)
    {

        $job = Job::find($id);
        // $job->valor = $request->valor;
        // $job->custo = $request->custo;
        $job->imposto = str_replace(',','.',$request->inputimposto);
        $job->save();

        return redirect()->route('orcamentojob', ['id'=>$id]);
    }

    public function closedorcamento($id, $valor)
    {
        $job = Job::find($id);
        $job->valor = $valor;
        $job->save();
        return  redirect()->route('detalhes.job', ['id'=>$id]);
    }

    public function financeiro($id)
    {
        $job = Job::find($id);

        return view('layouts.jobs.financeiro', ['id'=>$id,'job'=>$job]);
    }

    public function descricao($id)
    {
        $job = Job::find($id);

        return view('layouts.jobs.descricao', ['id'=>$id,'job'=>$job]);
    }
    public function descricaoeditar($id, Request $request)
    {

        $job = Job::find($id);
        $job->descricao = $request->descricao;
        $job->save();

        return redirect()->route('detalhes.job', ['id'=>$id]);
    }

    protected function gravar($nomejob, $parceiro, $praca, $codnome, $codnome, $codmail, $tipofaturamento, $codtele, $inicio, $fim, $status, $valor, $custo, $tipodejob)
    {
        $job = new Job();

        $job->nomeJob = $nomejob;
        $job->parceiro = $parceiro;
        $job->praca = $praca;
        $job->codnome = $codnome;
        $job->codemail = $codmail;
        $job->tipofaturamento = $tipofaturamento;
        $job->codtele = $codtele;
        $job->inicio = date('Y-m-d', strtotime(str_replace('/','-',$inicio)));
        $job->fim = date('Y-m-d', strtotime(str_replace('/','-',$fim)));
        $job->status = $status;
        $job->valor = $valor;
        $job->custo = $custo;
        $job->tipodejob = $tipodejob;

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
    //dd($request);
        $faturamento = new Faturamento();
        $faturamento->parceiro = $request->parceiro;
        $faturamento->tipo = $request->tipo;
        $faturamento->job = $request->job;
        $faturamento->valor = str_replace(',','.',$request->valor);
        $faturamento->status = "Aberto";
        $faturamento->job_id = $request->id_job;

        $faturamento->datafaturamento = date('Y-m-d', strtotime(str_replace('/','-',$request->datafaturamento)));

        $faturamento->lastuser = \Auth::user()->name;

        //$faturamento->atualizador= \Auth::user()->name;


        $faturamento->obs = $request->obs ;
        // dd($faturamento);
        $faturamento->save();

        return redirect()->route('jobs.financeiro', ['id'=>$request->id_job]);

    }

    public function formjobnf($id)
    {
        $faturamento = Faturamento::find($id);
        return view('forms.job.formnfjob',['faturamento'=>$faturamento]);

    }

    public function postjobnf(Request $request)
    {
        //dd($request);

        $faturamento = Faturamento::find($request->id);

        $faturamento->nf = $request->nf;
        $faturamento->valorfaturado = str_replace(',','.',$request->valorfaturado);
        $faturamento->valorliquido = str_replace(',','.',$request->valorliquido);
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

        return redirect()->route('jobs.financeiro', ['id'=>$request->job_id]);

    }


}
