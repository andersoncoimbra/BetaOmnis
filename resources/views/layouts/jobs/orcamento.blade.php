@extends('layouts.dashboard')
@section('breadcrumbs')
    {!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!} >>
    {!! Html::linkRoute('detalhes.job', 'Detalhes do Job', $id) !!}
@endsection
@section('title')
    Orçamento
    @endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div id="print" class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <img src="{{URL::to('assets/logo.png')}}" style="height: 80px; width: auto;">
                            </div>
                            <div class="col-md-8">
                                <h3>{{$job->nomeJob}}</h3>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6" style="border: 1px solid #dddddd; border-right: none;">
                            <table class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                                <tr><th class="active">Parceiro:</th> <td>{{$job->parceiros->nome}}</td></tr>
                            </table>
                            <table  class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                                <tr><th class="active">Praça:</th> <td>{{$job->pracas->nome}}</td></tr>
                            </table>
                            <table  class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                                <tr><th class="active">Atendimento:</th> <td></td></tr>
                            </table>
                        </div>
                        <div class="col-md-6" style="border: 1px solid #dddddd">
                            <table class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                                <tr><th class="active">Coordenador:</th> <td>{{$job->codnome}}</td></tr>
                            </table>
                            <table  class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                                <tr><th class="active">Período da Ação:</th> <td>De {{date('d / m ', strtotime($job->inicio))}} A {{date('d / m / Y', strtotime($job->fim))}}</td></tr>
                            </table>
                            <table  class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                                <tr><th class="active">Data do Briefing:</th> <td>{{date('d / m / Y', strtotime($job->created_at))}}</td></tr>
                            </table>
                        </div>
                    </div>
                    <p class="bg-primary" style="padding: 13px; text-align: center; margin-left: 10px; margin-right: 10px;">Informações Financeira</p>
                    <p class="bg-success" style="padding: 10px; text-align: center; margin-left: 10px; margin-right: 10px;">Pagamentos | Contratação</p>
                    <div class="col-md-12">
                        <table class="table">
                            <tr><th>Qtd</th><th>Cargo</th><th>Valor</th><th>Custo</th></tr>
                            <?php
                            $custototal = null;
                            $valortotal = null;
                            ?>
                            @forelse($vj as $v)
                                <tr><td>{{$v->quantidade}}</td><td>{{$v->cargos->nome}}</td><td>{{$v->valor}}</td><td>{{$v->custo}}</td></tr>
                                <?php
                                $custototal += $v->quantidade*$v->custo;
                                $valortotal += $v->quantidade*$v->valor;
                                ?>
                            @empty
                                <tr><td>Sem cargos adicionados</td></tr>
                            @endforelse
                        </table>
                        @if($custototal && $valortotal)
                            <p class="bg-info" style="padding: 10px; text-align: right">Taxa da coligada: <strong>{{$job->taxacoligada}}</strong></p>
                            <p class="bg-info" style="padding: 10px; text-align: right">Valor do Serviço: <strong>{{$valortotal + $job->taxacoligada}}</strong></p>
                            <p class="bg-info" style="padding: 10px; text-align: right">Imposto: <strong>...</strong></p>
                            <p class="bg-info" style="padding: 10px; text-align: right">Valor para emissão da NF: <strong>...</strong></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div id="print" class="panel panel-default">
                    <div class="panel-heading">
                        <button id="btn btn-default">Imprimir</button>
                        <button class="btn btn-info">Fecha Orçamento</button>

                    </div>
                </div>
            </div>
        </div>
@endsection

