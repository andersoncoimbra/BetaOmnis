@extends('layouts.dashboard')
@section('breadcrumbs')
    >>{!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!}
    >>{!! Html::linkRoute('detalhes.job', 'Detalhes do Job', $id) !!}

@endsection
@section('content')
    <!--
    View chamada pelo controle
    JobController-solicitapessoal
    -->

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Cadastro de vagas do job - {{$nomejob}}</h3></div>
                    <div class="panel-body " style="padding-right: 5px; padding-left: 5px;">
                        @include('forms.job.solicitapessoal')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Vagas do job</h3></div>
                    <div class="panel-body " style="padding-right: 5px; padding-left: 5px;">
                        <table class="table">
                            <tr><th>#</th><th>Cargo</th><th>Contratante</th><th>Quantidade</th><th>Periodo</th><th>Valor</th><th>Custo Efetivo</th><th>Ações</th></tr>
                            @forelse($job->vagaJobs as $v)
                                <tr><td>{{$v->id}}</td><td>{!! $cargos->find($v->cargo)->nome !!}</td><td>{{$ct[$v->contratante]}}</td><td>{{$v->quantidade}}</td><td>{{$per[$v->periodo]}}</td><td>{{"R$ ".$v->valor}}</td><td>{{"R$ ".$v->custo}}</td><td><a href="{{url()->current()}}/{{$v->id}}"><button class="btn btn-warning">Detalhes</button> </a><a href="{{URL::route('jobs.sp.candidato', array('id'=>$id,'idvaga'=>$v->id))}}"><button class="btn btn-success">Alocar Candidato</button></a></td></tr>
                            @empty
                                <p>Nenhuma vaga cadastrada</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection