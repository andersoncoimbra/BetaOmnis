<table class="table table-striped">
    <thead>
    <tr><th>#ID</th><th>Tipo</th><th>Valor</th> <th>Ações</th></tr></thead>
    <tbody>
    @forelse($jobs as $faturas)
        @if($faturas->tipo == 0)
        <tr><td>{{$faturas->id}}</td><td>NF</td><td>{{str_replace('.',',',$faturas->valor)}}</td><td><button type="button" class="btn btn-info" onclick="formModal('detalhes', '{{$faturas->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" >Detalhes</button><button  class="btn btn-primary"  onclick="jobnf({{$faturas->id}})" style="margin-right: 2px; margin-left: 2px" >Nota Fiscal</button>@if($faturas->nf)<button class="btn btn-danger" onclick="formModal('quitacao','{{$faturas->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px">Quitação</button> @endif</td></tr>
        @endif
        @if($faturas->tipo == 1)
            <tr><td>{{$faturas->id}}</td><td>ND</td><td>{{str_replace('.',',',$faturas->valor)}}</td><td><button type="button" class="btn btn-info" onclick="formModal('detalhes', '{{$faturas->id}}','faturamento')" style="margin-right: 2px; margin-left: 2px" >Detalhes</button> <button class="btn btn-danger" onclick="formModal('quitacao','{{$faturas->id}}', 'faturamento')" style="margin-right: 2px; margin-left: 2px">Quitação</button></td></tr>
            @endif
    @empty
        <tr>Sem Faturas registradas</tr>
    @endforelse
    </tbody>
</table>