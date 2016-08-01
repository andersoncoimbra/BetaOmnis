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
                        @include('list.listfaturamento')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
