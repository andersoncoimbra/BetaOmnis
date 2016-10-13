@extends('layouts.dashboard')
@section('breadcrumbs')
    >>{!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!}
    >>{!! Html::linkRoute('detalhes.job', 'Detalhes do Job', $id) !!}

@endsection

@section('title')
    Relatório Financeiro
    @endsection
@section('content')
    @include('modal.reembolso.addReembolso')
    @include('modal.reembolso.detalhes')
    @include('modal.reembolso.checkin')
    @include('modal.reembolso.quitacao')

    @include('forms.faturamento.modal.nf')
    @include('forms.faturamento.modal.quitacao')
    @include('forms.job.modal.faturamento')
    @include('forms.faturamento.modal.detalhes')

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Faturamento</h4></div>
                <div class="panel-body">

                    <input type="button" class="btn btn-success pull-right" value="Novo Faturamento" onclick="formModal('faturamento')" style="margin-bottom: 10px;">

                    @include('list.jobs.faturamentodeJob', ['jobs'=> $job->faturas])
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Reembolso</h4></div>
                <div class="panel-body">

                    <input type="button" class="btn btn-success pull-right" value="Novo Reembolso" onclick="newreembolso()" style="margin-bottom: 10px;">
                    @include('list.listreembolso', ['reembolsos'=> $job->reembolsos])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function newreembolso() {
            $('#novo-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/new/job/'.$job->id)}}'
                }).done(function (html) {

                    $('#novo-reembolso').html(html);

                })
                $('#modal-reembolso').modal('show');

            });
        }
    </script>
    <script type="text/javascript">
        function detalhesreembolso(id) {
            $('#detalhes-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/')}}/'+id+'/detalhes'
                }).done(function (html) {

                    $('#detalhes-reembolso').html(html);

                })
                $('#detalhes').modal('show');

            });
        }
    </script>

    <script type="text/javascript">
        function checkinreembolso(id) {
            $('#detalhes-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/')}}/'+id+'/checkin'
                }).done(function (html) {

                    $('#checkin-reembolso').html(html);

                })
                $('#checkin').modal('show');

            });
        }
    </script>

    <script type="text/javascript">
        function quitacaoreembolso(id) {
            $('#quitacao-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/')}}/'+id+'/quitacao'
                }).done(function (html) {

                    $('#quitacao-reembolso').html(html);

                })
                $('#quitacao').modal('show');

            });
        }
    </script>

    <script>

    function jobnf(id) {
    $("#faturamento-nf").html("Carregando...");
    $(document).ready(function () {
    $.ajax({
    url: '{{URL::to('/jobs/')}}/'+id+'/financeiro/formnf'
    }).done(function (html) {

    $("#faturamento-nf").html(html);

    })
    $('#form_add_nf').modal('show');

    });
    }
    </script>

@endsection
