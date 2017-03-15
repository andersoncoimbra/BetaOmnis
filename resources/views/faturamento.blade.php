@extends('layouts.dashboard')

@section('content')


            @include('panel.dashboardFaturamento', ['totalquitacao' => $totalquitacao,'totalfaturado'=>$totalfaturado,'totalreceber'=>$totalreceber])

            <button class="btn btn-info pull-right" style="margin-left: 10px; margin-right: 19px;">Vencidos</button>
            <button class="btn btn-info pull-right" style="margin-left: 10px;">A Receber</button>
            <button class="btn btn-info pull-right" style="margin-left: 10px;">A Receber \ Vencidos</button>

            <input type="button" class="btn btn-success pull-right" value="Vencidos a 5 dias" onclick="showModal('#vencimento5')" style="margin-left: 10px;">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Faturamento</div>

                    <div class="panel-body">
                        @include('modal.faturamento.vencimento5')
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
