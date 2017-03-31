<table class="table table-striped">
    <tr><th>#ID</th><th>Tipo</th><th>Parceiro</th><th>Job</th><th>Valor</th><th>Ações</th><td></td><td></td></tr>
    @forelse($faturamentos as $faturamento)

        @if($faturamento->tipo == 0)
            <tr class="
            @if($faturamento->nf<1)
                    danger
            @endif
            @if($faturamento->nf && $faturamento->valorrecebido)

            @else
                    success
            @endif
                "><td>{{$faturamento->id}}</td><td>NF</td><td>{{$faturamento->parceiro}}</td><td>{{$faturamento->job}}</td><td>{{$faturamento->valor}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes', '{{$faturamento->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" ></td><td><input type="button" class="btn btn-primary" value="Nota Fiscal" onclick="formModal('nf','{{$faturamento->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" ></td><td>@if($faturamento->nf)<input type="button" class="btn btn-danger" value="Quitação" onclick="formModal('quitacao','{{$faturamento->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" > @endif</td></tr>
        @endif

        @if($faturamento->tipo == 1)
            <tr><td>{{$faturamento->id}}</td><td>ND</td><td>{{$faturamento->parceiro}}</td><td>{{$faturamento->job}}</td><td>{{$faturamento->valor}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes', '{{$faturamento->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" ></td><td><td> <input type="button" class="btn btn-danger" value="Quitação" onclick="formModal('quitacao','{{$faturamento->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" > </td></tr>
        @endif
        @empty
        <p>Sem registro de Reembolso</p>
    @endforelse
</table>

