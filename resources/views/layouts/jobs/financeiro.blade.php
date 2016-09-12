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
@endsection
