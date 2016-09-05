@extends('layouts.dashboard')
@section('breadcrumbs')
    >>{!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!}
@endsection
@include('modal.jobs.editarjob')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Job - {{$job->nomeJob}}</h3></div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <dl>
                                <dt>Nome do Job</dt>
                                <dd>{{$job->nomeJob}}</dd>
                                <dt>Parceiro</dt>
                                <dd>{{$job->parceiros->nome}}</dd>
                                <dt>Praça</dt>
                                <dd>{{$p[$job->praca]}}</dd>
                                <dt>Coordenador Parceiro</dt>
                                <dd>{{$job->codnome}}</dd>
                                <dt>E-mail coordenador</dt>
                                <dd>{{$job->codemail}}</dd>
                                <dt>Telefone</dt>
                                <dd>{{$job->codtele}}</dd>
                                <dt>Nota Fiscal</dt>
                                <dd>{{$job->nf? 'Sim': 'Não'}}</dd>
                                <dt>Data de Inicio</dt>
                                <dd>{{date('d / m / Y', strtotime($job->inicio))}}</dd>
                                <dt>Data de Finalização </dt>
                                <dd>{{date('d / m / Y', strtotime($job->fim))}}</dd>
                                <dt>Status</dt>
                                <dd>{{$ds[$job->status]}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6 ">
                            <p>Vagas do Job</p>
                            <table class="table">
                                <tr><th>Qtd</th><th>Descrição</th><th>Cargo</th><th>Valor</th><th>Custo</th></tr>
                                <?php
                                $custototal = null;
                                $valortotal = null;
                                $custoextra = null;
                                ?>
                                @forelse($vj as $v)
                                    <tr class="active"><td>{{$v->quantidade}}</td><td>Descrição</td><td>{{$dp[$v->cargo]}}</td><td>{{$v->valor}}</td><td>{{$v->custo}}</td></tr>
                                    @forelse($v->extras as $e)
                                    <!--
                                    Troca parametro tipo por um relacionamento
                                    -->
                                        <tr><td></td><td class="info">{{$e->quantidade." ".$tipo[$e->tipo]}}</td><td class="info"></td><td class="info">{{$e->valor}}</td><td class="info">{{$e->quantidade*$e->custo}}</td></tr>
                                        <?php
                                        $custoextra += $e->quantidade*$e->custo*$v->quantidade
                                        ?>
                                    @empty
                                    @endforelse
                                    <?php
                                    $custototal += $v->quantidade*$v->custo;
                                    $valortotal += $v->quantidade*$v->valor;
                                    ?>
                                @empty
                                    <tr><td>Sem cargos adicionados</td></tr>
                                @endforelse
                            </table>
                            @if($custototal && $valortotal)
                                <p class="bg-warning" style="padding: 10px; text-align: right">{{$custoextra?"Extras Custo total:": "Sem custo Extra" }}<strong>{{$custoextra}}</strong></p>
                                <p class="bg-warning" style="padding: 10px; text-align: right">Contrações Custo total: <strong>{{$custototal+$custoextra}}</strong></p>
                                <p class="bg-primary" style="padding: 10px; text-align: right">Contrações Valor total: <strong>{{$valortotal}}</strong></p>
                            @endif
                        </div>
                        <div class="col-md-3 clearfix">
                            <p class="bg-success" style="padding: 10px; text-align: right">Valor global: <strong>R$ {{$job->valor}}</strong></p>
                            @if($custototal > $job->valor)
                                <p class="bg-danger" style="padding: 10px; text-align: right">Atenção prejuizo em <strong>R$ {{$custototal-$job->valor }}</strong></p>
                            @else
                                <p class="bg-info" style="padding: 10px; text-align: right">Saldo: <strong>R$ {{$job->valor-$custototal}}</strong></p>
                            @endif
                        </div>

                        <div class="col-md-12 clearfix">
                            <button class="btn btn-danger " onclick="editarjob({{$job->id}});">Editar</button>
                            <a href="{{URL::route('jobs.sp', $job->id)}}"> <button class="btn btn-default ">Solicitações de pessoal</button></a>
                            <button class="btn btn-info ">Solicitações</button>
                            <button class="btn btn-success ">Informaçoes do Job</button>
                            <a href="{{url()->current()}}/o"><button class="btn btn-warning ">Gerar Orçamento</button></a>
                            <a href="{{URL::route('jobs.financeiro', $job->id)}}"><button class="btn btn-primary ">Financeiro</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
