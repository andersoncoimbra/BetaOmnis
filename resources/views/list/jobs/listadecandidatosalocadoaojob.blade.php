<table class="table">
    <tr><th>#ID</th><th>Nome</th><th>Ações</th></tr>
@forelse($candidatosjob as $candidato)
    <tr><td>{{$candidato->id}}</td><td>{{$candidato->nome}}</td><td><a href=""><button class="btn btn-danger">Remover</button></a></td></tr>
    @empty

<p>Sem candidato alocado ao job</p>
    @endforelse
</table>