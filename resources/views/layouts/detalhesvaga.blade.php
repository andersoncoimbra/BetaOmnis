@extends('layouts.dashboard')
@section('breadcrumbs')
    >>{!! Html::linkRoute('lista.jobs', 'Todos os Jobs') !!}
    >>{!! Html::linkRoute('detalhes.job', 'Detalhes do Job', $id) !!}
    >>{!! Html::linkRoute('jobs.sp', 'Cadastro de Vaga', $id) !!}


@endsection
@section('content')
          <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Detalhes de vagas do job - {{$job->nomeJob}}</h3></div>
                    <div class="panel-body" style="padding-right: 5px; padding-left: 5px;">
                        <div class="col-md-5">
                            <dl class="dl-horizontal">
                                <dt>Vaga:</dt>
                                <dd>{{$dp[$vj->cargo]}}</dd>
                                <dt>Regime:</dt>
                                <dd>{{$r[$vj->regime]}}</dd>
                                <dt>Contratante:</dt>
                                <dd>{{$ct[$vj->contratante]}}</dd>
                                <dt>Quantidade:</dt>
                                <dd>{{$vj->quantidade}}</dd>
                                <dt>Periodo:</dt>
                                <dd>{{$per[$vj->periodo]}}</dd>
                                <dt>Praça:</dt>
                                <dd>{{$p[$job->praca]}}</dd>
                                <dt>Valor:</dt>
                                <dd>{{$vj->valor}}</dd>
                                <dt>Custo Efetivo:</dt>
                                <dd>{{$vj->custo}}</dd>
                                <dt>Job:</dt>
                                <dd>{{$job->nomeJob}}</dd>
                            </dl>
                        </div>
                        <div class="col-md-7">
                            <table class="table">
                                <caption>Extras</caption>
                                <tr><th>Tipo</th><th>Qtd</th><th>Periodo</th><th>Valor</th><th>Custo</th></tr>
                                @forelse($evj as $v)
                                    <tr><td>{{$tipo[$v->tipo]}}</td><td>{{$v->quantidade}}</td><td>{{$per[$v->periodo]}}</td><td>{{$v->valor}}</td><td>{{$v->custo}}</td></tr>
                                @empty
                                    <p>Sem Extra nesse cargo</p>
                                @endforelse

                            </table>
                        </div>
                        <div class="col-lg-12">
                            {!! Form::open(array('url' => '/jobs/'.$id.'/sp/'.$vj->id, 'class'=>'form-horizontal')) !!}
                            <div class="col-lg-2">
                                {!! Form::label('tipo', 'Tipo', array('class' => 'control-label')) !!}
                                <select name="tipo" class="form-control">
                                    @forelse($tipo as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @empty
                                        <p>Sem tipos de ajuda</p>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('qtd', 'Quantidade', array('class' => 'control-label')) !!}
                                <input type="text" name="qtd" class="form-control">
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('per', 'Periodo', array('class' => 'control-label')) !!}
                                <select class="form-control" name="per">
                                    @forelse($per as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @empty
                                        <p>Sem periodo</p>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('var', 'Valor', array('class' => 'control-label')) !!}
                                <input class="form-control" name="var">
                            </div>
                            <div class="col-lg-2">
                                {!! Form::label('custo', 'Custo efetivo', array('class' => 'control-label')) !!}
                                <input class="form-control" name="custo">
                            </div>
                            <div class="col-lg-2"><br>
                                <a href="" style="margin-top: auto;"><button type="submit" class="btn btn-info form-control">Adicionar</button></a>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection