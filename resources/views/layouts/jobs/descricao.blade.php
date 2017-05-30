@extends('layouts.dashboard')


@section('breadcrumbs')
    <ul class="breadcrumb">
        <li><a href="{{route("lista.jobs")}}">Todos os Jobs</a></li>
        <li><a href="{{route('detalhes.job', ['id'=>$id])}}">{{$job->nomeJob}}</a></li>
        <li class="active">Informações</li>
    </ul>
@endsection

@section('title')
    Informações do Job
@endsection
@section('content')

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Editar Informações</h4></div>
                <div class="panel-body">
                    {!! Form::model($job, array('route' => array('jobs.descricao.editar',$job->id), 'class'=>'form-horizontal')) !!}
                    {{ Form::textarea('descricao', null, ['style' => 'width: 100%; min-height: 35px; outline: none; resize: none;']) }}
                    <input type="submit" class="btn btn-success" value="Atualizar">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'descricao' );
    </script>
    @endsection