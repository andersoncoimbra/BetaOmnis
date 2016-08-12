@extends('layouts.dashboard')
@section('title')
    Novo Job
    @endsection
@section('content')
<div class="form-horizontal">
    {!! Form::open(array('url' => '/jobs', 'class'=>'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('nomejob', 'Nome do Job', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <input name="nomejob" class="form-control" type="text" placeholder="Escreva o nome do Job">
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('parceiro', 'Selecione o parceiro', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <select name="parceiro" class="form-control selectpicker" style="margin: 3px;">
                @forelse($parceiros as $parceiro)
                    <option value="{{$parceiro->id}}">{{$parceiro->nome}}</option>
                @empty
                    <option value="0" >Serm Parceiro</option>
                @endforelse
            </select>
        </div>

        {!! Form::label('praca', 'Selecione a praça', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <select name="praca" class="form-control selectpicker" style="margin: 3px;">
                @forelse($p as$key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @empty
                    <option value="0" >Sem Praça</option>
                @endforelse
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('codpar', 'Coordenador Parceiro', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <input name="codpar" class="form-control" type="text" placeholder="Nome do Coordenador Parceiro">
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('codemail', 'Email', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="codemail" class="form-control" type="text" placeholder="Email do Coordenador Parceiro">
        </div>

        {!! Form::label('codetele', 'Telefone', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="codetele" class="form-control" type="text" placeholder="Telefone Coordenador">
        </div>
    </div>

    <div class="form-group">

    </div>

    <div class="form-group">
        {!! Form::label('nf', 'Nota fiscal', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <select name="nf" class="form-control" >
                <option selected="selected" value="">Nota Fiscal</option>
                <option value="true">Sim</option><option value="false">Não</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('inicio', 'Data de Inicio', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="inicio"  class="form-control" type="date" placeholder="Inicio 12 / 07 / 2016">
        </div>

        {!! Form::label('fim', 'Data Fim', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="fim" class="form-control"  type="date" placeholder="Fim 12 / 07 / 2016">
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('valor', 'Valor global R$:', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="valor"  class="form-control" type="number" placeholder="9999,99">
        </div>

        {!! Form::label('custo', 'Custo Previsto R$:', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="custo" class="form-control"  type="number" placeholder="999,99">
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('praca', 'Status', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <select name="status"  class="form-control" >
                <option selected="selected" value="">Status</option>
                <option value="1">Orçamento</option>
                <option value="2">Standy by</option>
                <option value="3">Execução</option>
            </select>
        </div>
    </div>

    <input type="submit" class="btn btn-success" value="Registrar">
    {!! Form::close() !!}
</div>


@endsection