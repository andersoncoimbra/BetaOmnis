@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Reembolsos</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr><th>Parceiro</th><th>Job</th><th>Valor</th><th>data</th><th>Fornecedor</th><th>Identificador</th><th>Envio</th><th>Observações</th><th>Valor recebido</th><th>Data de Pagamento</th> <th>Ações</th></tr>
                            @forelse($reembolsos as $reembolso)
                                <tr><td>{{$reembolso->parceiro}}</td><td>{{$reembolso->job}}</td><td>{{$reembolso->valor}}</td><td>{{$reembolso->data}}</td><td>{{$reembolso->fornecedor}}</td><td>{{$reembolso->identificador}}</td><td>{{$reembolso->data_envio}}</td><td>{{$reembolso->obs}}</td><td>{{$reembolso->recibo}}</td><td>{{$reembolso->data_pagamento}}</td> <td><input type="button" class="btn btn-primary pull-right" value="Compensar">
                                    </td></tr>
                            @empty
                                <p>Sem registro de Reembolso</p>
                            @endforelse

                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
