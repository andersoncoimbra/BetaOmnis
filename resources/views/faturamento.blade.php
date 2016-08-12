@extends('layouts.dashboard')

@section('content')


            @include('panel.dashboardFaturamento', ['totalquitacao' => $totalquitacao,'totalfaturado'=>$totalfaturado,'totalreceber'=>$totalreceber])

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Faturamento</div>

                    <div class="panel-body">
                        @include('forms.faturamento.modal.addFaturamento')
                        @include('forms.faturamento.modal.detalhes')
                        @include('forms.faturamento.modal.quitacao')
                        @include('forms.faturamento.modal.nf')

                        <a href="{{URL::to('/faturamento/excel')}}"><input type="button" class="btn btn-info pull-left" value="Exportar Excel"  style="margin-bottom: 10px;"></a>
                        <input type="button" class="btn btn-success pull-right" value="Novo Faturamento" onclick="formModal('faturamento')" style="margin-bottom: 10px;">

                        @include('list.listfaturamento')
                    </div>
                </div>
            </div>


@endsection
