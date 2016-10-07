<table class="table">
    <tr><th>#ID</th><th>Valor</th> <th>Ações</th></tr>
    @forelse($jobs as $faturas)
        <tr><td>{{$faturas->id}}</td><td>{{$faturas->valor}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes', '{{$faturas->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Nota Fiscal" onclick="jobnf({{$faturas->id}})" style="margin-right: 2px; margin-left: 2px" >@if($faturas->nf)<input type="button" class="btn btn-danger" value="Quitação" onclick="formModal('quitacao','{{$faturas->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px" > @endif</td></tr>
    @empty
        <tr>Sem Faturas registradas</tr>
    @endforelse
</table>