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
                        {!! Form::open(array('url' => '/jobs/'.$id.'/sp', 'class'=>'form-horizontal')) !!}
                        <div class="col-md-2">
                            {!! Form::label('cargo', 'Cargo', array('class' => 'control-label')) !!}
                            <select name="cargo" class="form-control selectpicker" style="margin: 3px;">
                                <option value="1">Cargo 1</option>
                                <option value="2">Cargo 2</option>
                                <option value="3">Cargo 3</option>
                                <option value="4">Cargo 4</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('regime', 'Regime', array('class' => 'control-label')) !!}
                            <select name="regime" class="form-control selectpicker" style="margin: 3px;">
                                <option value="1">Regime 1</option>
                                <option value="2">Regime 2</option>
                                <option value="3">Regime 3</option>
                                <option value="4">Regime 4</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('contratante', 'Contratante', array('class' => 'control-label')) !!}
                            <select name="contratante" class="form-control selectpicker" style="margin: 3px;">
                                <option value="1">Omnis</option>
                                <option value="2">Parceiro</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('qtd', 'Quantidade', array('class' => 'control-label')) !!}
                            <input name="qtd" class="form-control" type="text" placeholder="Qtd">

                        </div>
                        <div class="col-md-2">
                            {!! Form::label('periodo', 'Periodo', array('class' => 'control-label')) !!}
                            <select name="periodo" class="form-control selectpicker" style="margin: 3px;">
                                <option value="1">Mensal</option>
                                <option value="2">Diario</option>
                                <option value="3">Unico</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('valor', 'Valor', array('class' => 'control-label')) !!}
                            <input name="valor" class="form-control" type="text" placeholder="Valor">

                        </div>

                        <div class="col-md-2">
                            {!! Form::label('custo', 'Custo', array('class' => 'control-label')) !!}
                            <input name="custo" class="form-control" type="text" placeholder="Custo efetivo">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-left">Adicionar</button>
                        </div>

                        {!! Form::close() !!}


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
                            @forelse($vj as $v)
                                <tr><td>{{$v->id}}</td><td>{{$c[$v->cargo]}}</td><td>{{$ct[$v->contratante]}}</td><td>{{$v->quantidade}}</td><td>{{$per[$v->periodo]}}</td><td>{{"R$ ".$v->valor}}</td><td>{{"R$ ".$v->custo}}</td><td><a href="{{url()->current()}}/{{$v->id}}"><button class="btn btn-warning">Detalhes</button> </a><a href="{{URL::route('jobs.sp.candidato', array('id'=>$id,'idvaga'=>$v->id))}}"><button class="btn btn-success">Alocar Candidato</button></a></td></tr>
                            @empty
                                <p>Nenhuma vaga cadastrada</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection