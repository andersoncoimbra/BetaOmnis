<table class="table table-striped">
    <tr><th>Parceiro</th><th>Job</th><th>Valor</th><th>Ações</th></tr>
    @forelse($faturamentos as $faturamento)
        <tr><td>{{$faturamento->parceiro}}</td><td>{{$faturamento->job}}</td><td>{{$faturamento->valor}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes', '{{$faturamento->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Nota Fiscal" onclick="formModal('nf')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-danger"  style="margin-right: 2px; margin-left: 2px" value="Quitação"  onclick="formModal('compensar')"></td></tr>
    @empty
        <p>Sem registro de Reembolso</p>
    @endforelse
</table>
