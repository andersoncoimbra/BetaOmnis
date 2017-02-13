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
            <input name="nomejob" class="form-control" type="text" placeholder="Escreva o nome do Job" required>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('parceiro', 'Selecione o parceiro', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-3">
            <select name="parceiro" ID="parceiro" class="form-control selectpicker" style="margin: 3px;">
                @forelse($parceiros as $parceiro)
                    <option value="{{$parceiro->id}}">{{$parceiro->nome}}</option>

                @empty
                    <option value="0" >Serm Parceiro</option>
                @endforelse
            </select>

        </div>
        <div class="col-sm-1">
            <button type="button" class="btn btn-info" onclick="ajaxaddparceiro();"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>

        {!! Form::label('praca', 'Selecione a praça', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <select name="praca" class="form-control selectpicker" style="margin: 3px;">
                @forelse($p as $value)
                    <option value="{{$value->id}}">{{$value->nome}}</option>
                @empty
                    <option value="0" >Sem Praça</option>
                @endforelse
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('codpar', 'Coordenador Parceiro', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <input name="codpar" class="form-control" type="text" placeholder="Nome do Coordenador Parceiro" required >
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
        {!! Form::label('tipofaturamento', 'Tipo Faturamento', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <select name="tipofaturamento" class="form-control" required >
                <option value="" selected disabled hidden>Selecione o tipo de faturamento</option>
                <option  value="Nota Fiscal">Nota Fiscal</option>
                <option value="Deposito">Deposito</option>
                <option value="Nota de Debito">Nota de Debito</option>
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

    <div class="form-group">
        {!! Form::label('tipodejob', 'Tipo de Job', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {{ Form::select('tipodejob', ['Normal', 'Tipo Pai'], 0, ['class' => 'col-sm-10 form-control']) }}
        </div>
    </div>




    <input type="submit" class="btn btn-success" value="Registrar">
    {!! Form::close() !!}
</div>
@endsection
@include('modal.jobs.ajaxAddParceiro')

@section('script')
    <script type="text/javascript">
        function ajaxaddparceiro() {
            $(document).ready(function () {
                $('#ajax_form_add_parceiro').modal('show');
            })
        }

        function addajaxparceiro(){
            var formdata = {
                _token: document.formaddparceiro.elements['_token'].value,
                nome: document.formaddparceiro.elements['nome'].value,
                cnpj: document.formaddparceiro.elements['cnpj'].value
            }
            $.ajax({
                url: "{{route('ajaxparceiro')}}",
                type: "POST",
                data: formdata,
                success: function (result) {
                    $("#parceiro").append(result)
                },
                error: function () {
                    $('#ajax_form_add_parceiro').modal('toggle');
                    $('#falha').modal('show');
                }
            });

            $('#ajax_form_add_parceiro').modal('toggle');
            $('#cadastrado').modal('show');
        }
    </script>
@endsection