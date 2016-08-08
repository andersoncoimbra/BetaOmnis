<table class="table table-striped">
    <tr><th>#ID</th><th>Parceiro</th><th>Job</th><th>Valor</th><th>Ações</th></tr>
    @forelse($faturamentos as $faturamento)
        <tr class="
        @if($faturamento->nf<1)
                danger
        @endif
        @if($faturamento->nf && $faturamento->valorrecebido)

        @else
                success
        @endif
                "><td>{{$faturamento->id}}</td><td>{{$faturamento->parceiro}}</td><td>{{$faturamento->job}}</td><td>{{$faturamento->valor}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes', '{{$faturamento->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Nota Fiscal" onclick="formModal('nf','{{$faturamento->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" >@if($faturamento->nf)<input type="button" class="btn btn-danger" value="Quitação" onclick="formModal('quitacao','{{$faturamento->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" > @endif</td></tr>
    @empty
        <p>Sem registro de Reembolso</p>
    @endforelse
</table>


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
                "><td>{{$fatura->id}}</td><td>{{$fatura->parceiro}}</td><td>{{$fatura->job}}</td><td>{{$fatura->valor}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes', '{{$fatura->id}}','fatura')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Nota Fiscal" onclick="formModal('nf','{{$fatura->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" >@if($fatura->nf)<input type="button" class="btn btn-danger" value="Quitação" onclick="formModal('quitacao','{{$fatura->id}}', 'fatura')" style="margin-right: 2px; margin-left: 2px" > @endif</td></tr>
    @empty
        <p>Sem registro de Reembolso</p>
    @endforelse
</table>