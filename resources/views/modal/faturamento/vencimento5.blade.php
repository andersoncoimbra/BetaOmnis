<div id="vencimento5" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Novo Faturamento</h4>
            </div>

            <table class="table table-striped">
                <caption>
                    Vencidos nos ultimos 5 dias
                </caption>
                <tr><th>#ID</th><th>Parceiro</th><th>Job</th><th>Valor</th><th>Ações</th></tr>
                @forelse($faturavenc as $fatura)
                    <tr class="
        @if($fatura->nf<1)
                            danger
                    @endif
                    @if($fatura->nf && $fatura->valorrecebido)

                    @else
                            success
                    @endif
                            "><td>{{$fatura->id}}</td><td>{{$fatura->parceiro}}</td><td>{{$fatura->job}}</td><td>{{$fatura->valor}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes', '{{$fatura->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Nota Fiscal" onclick="formModal('nf','{{$fatura->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" >@if($fatura->nf)<input type="button" class="btn btn-danger" value="Quitação" onclick="formModal('quitacao','{{$fatura->id}}', 'fatura')" style="margin-right: 2px; margin-left: 2px" > @endif</td></tr>
                @empty
                    <p>Sem registro de Reembolso</p>
                @endforelse
            </table>
        </div>
    </div>
</div>







