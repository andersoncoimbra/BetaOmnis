@extends('layouts.dashboard')
@section('title')
    Alocar Candidato
    @endsection
@section('breadcrumbs')
    >>{!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!}
    >>{!! Html::linkRoute('detalhes.job', 'Detalhes do Job', $id) !!}
    >>{!! Html::linkRoute('jobs.sp', 'Solicitação de pessoal', $id) !!}

@endsection


@section('content')
    <div class="row">
        <div class="col-md-8">
            <div id="print" class="panel panel-default">
                <div class="panel-heading">
                    Candidatos alocado a essa vaga
                    <button class="btn btn-info pull-right">Alocar novo candidato</button>
                </div>
                <div class="panel-body">
                    </div>
            </div>
        </div>

        <div class="col-md-4">
            <div id="print" class="panel panel-default">
                <div class="panel-heading">
                        Descrição da vaga
                </div>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>

@endsection