@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Faturamento</div>

                    <div class="panel-body">
                        @include('forms.faturamento.modal.addFaturamento')
                        @include('forms.faturamento.modal.detalhes')
                        @include('forms.faturamento.modal.quitacao')
                        @include('forms.faturamento.modal.nf')

                        <input type="button" class="btn btn-info pull-left" value="Exportar Excel"  style="margin-bottom: 10px;">
                        <input type="button" class="btn btn-success pull-right" value="Novo Faturamento" onclick="formModal('faturamento')" style="margin-bottom: 10px;">

                        @include('list.listfaturamento')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
