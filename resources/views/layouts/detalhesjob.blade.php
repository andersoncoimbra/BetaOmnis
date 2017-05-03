@extends('layouts.dashboard')
@section('breadcrumbs')
    <ul class="breadcrumb">
        <li><a href="{{route("lista.jobs")}}">Todos os Jobs</a></li>
        <li class="active">{{$job->nomeJob}}</li>
    </ul>
@endsection
@section('title')

    @endsection
@include('modal.jobs.editarjob')

@section('content')
    <?php

    $custototal = null;
    $valortotal = null;
    $custoextra = null;
    $custoomnis = null;
    $reembtotal = null;


    $valortotaljobfilho= null;
    $custototaljobfilho = null;
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="pull-right" style="margin-top: 3px; margin-right: 3px">
                        @if($job->tipodejob == 1)
                            <button class="btn btn-success" onclick="novojobfilho({{$job->id}});">Novo Job Filho</button>
                        @endif
                            @if($job->tipodejob == 2)
                               <a href="{{route('detalhes.job', ['id' => $job->jobpai])}}"> <button class="btn btn-success" >Job Pai</button></a>
                            @endif
                        <button class="btn btn-danger " onclick="editarjob({{$job->id}});">Editar</button>
                        <a href="{{URL::route('jobs.sp', $job->id)}}"> <button class="btn btn-default ">Equipe</button></a>
                        <button class="btn btn-info " style="display: none">Solicitações</button>
                        <button class="btn btn-success " style="display: none">Informaçoes do Job</button>
                        <a href="{{url()->current()}}/o"><button class="btn btn-warning ">Gerar Orçamento</button></a>
                        <a href="{{URL::route('jobs.financeiro', $job->id)}}"><button class="btn btn-primary ">Financeiro</button></a>
                    </div>
                    <div class="panel-heading"><h3>Job - {{$job->nomeJob}}</h3></div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            <dl>
                                @if($job->tipodejob)
                                <dt>Tipo de Job</dt>
                                <dd>{{$tipodejob[$job->tipodejob]}}
                                @endif
                                <dt>Nome do Job</dt>
                                <dd>{{$job->nomeJob}}</dd>
                                <dt>Parceiro</dt>
                                <dd>{{$job->parceiros->nome}}</dd>
                                <dt>Praça</dt>
                                <dd>{{$job->pracas->nome}}</dd>
                                <dt>Coordenador Parceiro</dt>
                                <dd>{{$job->codnome}}</dd>
                                <dt>E-mail coordenador</dt>
                                <dd>{{$job->codemail}}</dd>
                                <dt>Telefone</dt>
                                <dd>{{$job->codtele}}</dd>
                                <dt>Tipo de Faturamento</dt>
                                <dd>{{$job->tipofaturamento}}</dd>
                                <dt>Data de Inicio</dt>
                                <dd>{{date('d/m/Y', strtotime($job->inicio))}}</dd>
                                <dt>Data de Finalização </dt>
                                <dd>{{date('d/m/ Y', strtotime($job->fim))}}</dd>
                                <dt>Status</dt>
                                <dd>{{$ds[$job->status]}}</dd>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldescricao">
                                        Informações
                                    </button>
                                @if($job->taxacoligada != "0.00")
                                    <dt>Taxa Coligada</dt>
                                    <dd>{{$job->taxacoligada}}</dd>
                                @endif
                            </dl>
                        </div>
                        <div class="col-md-6 ">
                            @if($job->tipodejob && $job->tipodejob != 2 )

                            <p>Job Filhos</p>
                            <table class="table">
                                <tr><th>Nome</th><th>Detalhes</th></tr>
                                @forelse($jf as $j)
                                    <?php

                                   $valortotaljobfilho += $j->vagajobs->sum('valor');
                                   $custototaljobfilho += $j->vagajobs->sum('custo');
                                            ?>
                                    <tr><td>{{$j->nomeJob}}</td><td><a href="{{route('detalhes.job', ['id' => $j->id])}}">
                                                <button type="button" class="btn btn-danger">Detalhes</button></a></td></tr>
                                @empty
                                    <tr>Sem Jobs adicionados</tr>
                                @endforelse
                            </table>
                            @endif
                            <p>Vagas do Job</p>
                            <table class="table">
                                <tr><th>Qtd</th><th>Cargo</th><th>Valor</th><th>Custo</th></tr>

                                @forelse($vj as $v)
                                    <tr class="active"><td>{{$v->quantidade}}</td><td>{{$v->cargos->nome}}</td><td>{{$v->valor}}</td><td>{{$v->custo}}</td></tr>
                                    @forelse($v->extras as $e)
                                    <!--
                                    Troca parametro tipo por um relacionamento
                                    -->
                                        <tr><td></td><td class="info">{{$e->quantidade." ".$tipo[$e->tipo]}}</td><td class="info">{{$e->valor}}</td><td class="info">{{$e->quantidade*$e->custo}}</td></tr>
                                        <?php
                                        $custoextra += $e->quantidade*$e->custo*$v->quantidade
                                        ?>
                                        @if($v->contratante == '1')
                                            <?php
                                                $custoomnis += $e->quantidade*$e->custo*$v->quantidade
                                            ?>
                                            @endif
                                    @empty
                                    @endforelse
                                    <?php
                                    $custototal += $v->quantidade*$v->custo;
                                    $valortotal += $v->quantidade*$v->valor;
                                    ?>
                                    @if($v->contratante == '1')
                                        <?php
                                        $custoomnis += $v->quantidade*$v->custo;
                                        ?>
                                    @endif
                                @empty
                                    <tr><td>Sem cargos adicionados</td></tr>
                                @endforelse
                            </table><p></p>
                            <p>Reembolsos</p>
                            <table class="table">
                                <tr><th>#ID</th><th>Descrição</th><th>Valor</th></tr>

                                @forelse($job->reembolsos as $reemb)
                                    <?php $reembtotal += $reemb->valor ?>
                                    <tr><td>{{$reemb->id}}</td><td>{{$reemb->obs}}</td><td>{{$reemb->valor}}</td></tr>
                                    @empty
                                @endforelse


                                </table>
                            @if($custototal && $valortotal)
                                <p class="bg-warning" style="padding: 10px; text-align: right">{{$custoextra?"Extras Custo total:": "Sem custo Extra" }}<strong>{{$custoextra}}</strong></p>
                                <p class="bg-warning" style="padding: 10px; text-align: right">Contrações Custo total: <strong>{{$custototal+$custoextra}}</strong></p>
                                <p class="bg-primary" style="padding: 10px; text-align: right">Contrações Valor total: <strong>{{$valortotal}}</strong></p>
                            @endif
                        </div>
                        <div class="col-md-3 clearfix">
                            @if($job->tipodejob == 2)
                            @if($job->finacomp)
                            <p class="bg-info" style="padding: 10px; text-align: right">Financeiro Compartilhado</p>
                            @endif
                            @endif
                            <p class="bg-success" style="padding: 10px; text-align: right">Valor: <strong>R$ {{$job->valor}}</strong></p>
                            @if($custoomnis > $job->valor)
                                <p class="bg-danger" style="padding: 10px; text-align: right">Atenção prejuizo em <strong>R$ {{$custoomnis-$job->valor }}</strong></p>
                            @else
                                <p class="bg-info" style="padding: 10px; text-align: right">Saldo: <strong>R$ {{$job->valor-$custoomnis - $jf->sum('imposto')- $job->imposto - $custototaljobfilho}}</strong></p>
                            @endif
                                @if($job->faturas->sum('valorrecebido')> 0)
                                    <p class="bg-info" style="padding: 10px; text-align: right">Total de Recebido: R$ {{$job->faturas->sum('valorrecebido')}}</p>
                                    @else
                                    <p class="bg-info" style="padding: 10px; text-align: right">Nenhum pagamento</p>
                                @endif
                                @if($reembtotal> 0)
                            <p class="bg-danger" style="padding: 10px; text-align: right">Total de Reembolsos: R$ {{$reembtotal}}</p>
                                @endif
                                @if($job->tipodejob == 1)
                            <p class="bg-danger" style="padding: 10px; text-align: right">Custo Total de Job Filho:<br> R$ {{$custototaljobfilho}}</p>
                            <p class="bg-info" style="padding: 10px; text-align: right">Valor Total de Job Filho:<br> R$ {{$valortotaljobfilho}}</p>
                                    @endif





                        </div>


                    </div>
                </div>
            </div>
        </div>


    <!-- Modal Descriçao -->
    <div class="modal fade" id="modaldescricao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Infomações sobre o job</h4>
                </div>
                <div class="modal-body">
    {{$job->descricao}}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    <a href="{{route('jobs.descricao', ['id'=> $job->id])}}"><button type="button" class="btn btn-primary">Editar</button>
    </a>
</div>
</div>
</div>
</div>
@endsection

