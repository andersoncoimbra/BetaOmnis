@extends('layouts.dashboard')
@section('breadcrumbs')
    >>{!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!}
@endsection
@section('title')

    @endsection
@include('modal.jobs.editarjob')
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="pull-right" style="margin-top: 3px; margin-right: 3px">
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
                                @if($job->taxacoligada != "0.00")
                                    <dt>Taxa Coligada</dt>
                                    <dd>{{$job->taxacoligada}}</dd>
                                @endif
                            </dl>
                        </div>
                        <div class="col-md-6 ">
                            <p>Vagas do Job</p>
                            <table class="table">
                                <tr><th>Qtd</th><th>Cargo</th><th>Valor</th><th>Custo</th></tr>
                                <?php
                                $custototal = null;
                                $valortotal = null;
                                $custoextra = null;
                                $custoomnis = null;
                                $reembtotal = null;
                                ?>
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
                            <p class="bg-success" style="padding: 10px; text-align: right">Valor: <strong>R$ {{$job->valor}}</strong></p>
                            @if($custoomnis > $job->valor)
                                <p class="bg-danger" style="padding: 10px; text-align: right">Atenção prejuizo em <strong>R$ {{$custoomnis-$job->valor }}</strong></p>
                            @else
                                <p class="bg-info" style="padding: 10px; text-align: right">Saldo: <strong>R$ {{$job->valor-$custoomnis}}</strong></p>
                            @endif
                            <p class="bg-info" style="padding: 10px; text-align: right">Total de Recebido: R$ {{$job->faturas->sum('valorrecebido')}}</p>
                            <p class="bg-danger" style="padding: 10px; text-align: right">Total de Reembolsos: R$ {{$reembtotal}}</p>
                            {{$job->faturas->sum('valorrecebido')}}


                        </div>


                    </div>
                </div>
            </div>
        </div>
@endsection

