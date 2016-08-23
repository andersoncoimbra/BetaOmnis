@extends('layouts.dashboard')

@section('title')
    Relatório Financeiro
    @endsection
@section('content')
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

@endsection
