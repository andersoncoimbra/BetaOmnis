@extends('layouts.dashboard')
@section('breadcrumbs')
    {!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!} >>
    {!! Html::linkRoute('detalhes.job', 'Detalhes do Job', $id) !!}
@endsection
@section('title')
    Orçamento
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
                <img src="{{URL::to('assets/logo.png')}}" style="height: 80px; width: auto;">

        </div>
        <div class="panel-body">

            <table class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">

                <tr><th class="active">Job:</th> <td>{{$job->nomeJob}}</td></tr>
            </table>
            <div class="col-md-6" style="border: 1px solid #dddddd; border-right: none;">

                <table class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">

                    <tr><th class="active">Parceiro:</th> <td>{{$job->parceiros->nome}}</td></tr>
                </table>
                <table  class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                    <tr><th class="active">Praça:</th> <td>{{$job->pracas->nome}}</td></tr>
                </table>
                @if($job->valor)
                    <table  class="table" style="margin-top: 3px; border: 1px solid #dddddd; margin: 10px">
                        <tr><th class="danger">Valor Fechado:</th> <td>R$ {{$job->valor}}</td></tr>
                    </table>
                @endif
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
        <table class="table">
            <tr><th>Qtd</th><th>Cargo</th><th>Valor</th><th></th></tr>
            <?php
            $custototal = null;
            $valortotal = null;
            $valoromnis = null;
            $custoextra = null;
            ?>
            <tr class="info"><td>{{$job->nomeJob}}</td><td></td><td></td></tr>
            @forelse($vj as $v)
                  <tr><td>{{$v->quantidade}}</td><td>{{$v->cargos->nome}}</td><td>{{$v->valor}}</td><td></td></tr>

                @forelse($v->extras as $e)
                <!--
                                    Troca parametro tipo por um relacionamento
                                    -->
                    <tr><td></td><td class="info">{{$e->quantidade." ".$tipo[$e->tipo]}}</td><td class="info">{{$e->valor}}</td><td class="info"></td></tr>
                    <?php
                    $custoextra += $e->quantidade*$e->custo*$v->quantidade
                    ?>
                    @if($v->contratante == '1')
                        <?php
                        $valoromnis += $e->quantidade*$e->valor*$v->quantidade
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
                    $valoromnis += $v->quantidade*$v->valor;
                    ?>
                @endif
            @empty
                <tr><td>Sem cargos adicionados</td></tr>
            @endforelse
            @if($jf->count() > 0)
                @foreach($jf as $jobfilho)
                @if($jobfilho->vagajobs->count() > 0)
                        <tr class="info"><td>{{$jobfilho->nomeJob}}</td><td></td><td></td></tr>
                    @forelse($jobfilho->vagajobs as $v)
                        <tr><td>{{$v->quantidade}}</td><td>{{$v->cargos->nome}}</td><td>{{$v->valor}}</td><td></td></tr>

                        @forelse($v->extras as $e)
                        <!--
                                    Troca parametro tipo por um relacionamento
                                    -->
                            <tr><td></td><td class="info">{{$e->quantidade." ".$tipo[$e->tipo]}}</td><td class="info">{{$e->valor}}</td><td class="info"></td></tr>
                            <?php
                            $custoextra += $e->quantidade*$e->custo*$v->quantidade
                            ?>
                            @if($v->contratante == '1')
                                <?php
                                $valoromnis += $e->quantidade*$e->valor*$v->quantidade
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
                            $valoromnis += $v->quantidade*$v->valor;
                            ?>
                        @endif
                    @empty
                        <tr><td>Sem cargos adicionados</td></tr>
                    @endforelse
                    @endif
                @endforeach
                @endif
        </table>
        <p class="bg-success" style="padding: 10px; text-align: center; margin-left: 10px; margin-right: 10px;">Informações para pagamento</p>

        @if($valoromnis)
            <p class="bg-info" style="padding: 13px; text-align: right; margin-left: 10px; margin-right: 10px;">Valor do Serviço: <strong>R$ {{number_format($valoromnis, 2, ',', '.')}}</strong></p>
            <p class="bg-info" style="padding: 13px; text-align: right; margin-left: 10px; margin-right: 10px;">Taxa da coligada: <strong>R$ {{number_format($job->taxacoligada, 2, ',', '.')}}</strong></p>
            <p class="bg-info" style="padding: 13px; text-align: right; margin-left: 10px; margin-right: 10px;">Imposto: <strong>R$ {{number_format($job->imposto, 2, ',', '.')}}</strong></p>
            <p class="bg-info" style="padding: 13px; text-align: right; margin-left: 10px; margin-right: 10px;">Valor para emissão da NF: <strong>R$ {{number_format($valoromnis + $job->taxacoligada + $job->imposto, 2, ',', '.')}}</strong></p>
        @endif



    </div>

    @if($job->status = "Orçamento")
        <button class="btn btn-info" onclick="showModal('#taxacoligada');">Calcular taxa</button>

        <button class="btn btn-info" onclick="showModal('#imposto');">Calcular Imposto</button>

        <a href="{{URL::current()}}/{{$valoromnis + $job->taxacoligada + $job->imposto}}/closed"><button class="btn btn-info">Fecha Orçamento</button></a>
    @endif





@endsection

<script type="text/javascript">

    ///////////////////////////////////
    //// Algoritmos para auxiliar no calculo de Taxa de coligada
    /////////////////////////////////

    function valorglobal() {

        return {{$valoromnis}}
    }
    function contratacoes() {
        return {{$valortotal}}
    }
    function extras() {
        return {{$custoextra}}
    }

    var i = function (id) { return document.getElementsByName(id)[0]}
    var a = function (id) { return document.getElementsByName(id)}




    var countChecked = function() {




        // O valor globlal esta sento registrado na view de
        // Orçamento como um metodo javascript no final do codigo
        console.log(valorglobal());
        console.log(i('valortaxacoligada').value);
        console.log(contratacoes());
        if(a('total')[0].checked) {
            i('valortaxacoligada').value = valorglobal() * (i('percentual').value / 100);
        }
        if(a('total')[1].checked) {
            i('valortaxacoligada').value = contratacoes() * (i('percentual').value / 100);
        }
        if(a('total')[2].checked) {
            i('valortaxacoligada').value =  (contratacoes()+ extras()) * (i('percentual').value / 100);;
        }

    };



    countChecked();

    function imposto() {

        console.log(i('percentualimposto').value);

        a('totalimposto')[0].disabled = false
        a('totalimposto')[1].disabled = false

        if(a('totalimposto')[0].checked) {
            i('inputimposto').value = ((valorglobal(){{"+".$job->taxacoligada}}) * (i('percentualimposto').value.replace(',','.') / 100)).toFixed(2);
        }
        if(a('totalimposto')[1].checked) {
            i('inputimposto').value = (contratacoes() * (i('percentualimposto').value.replace(',','.') / 100)).toFixed(2);
        }

    }

</script>

@include('modal.jobs.formTaxaColigada')
@include('modal.jobs.formImposto')
