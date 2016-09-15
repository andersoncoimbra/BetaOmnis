<table class="table">
    <caption>Lista de candidatos
    </caption>
    <tr><th>#ID</th><th>Nome</th><th>Telefone</th></tr>
@forelse($candidatos as $candidato)
    <tr><td>{{$candidato->id}}</td><th>{{$candidato->nome}}</th><th>{{$candidato->telefone}}</th></tr>
    @empty
    Sem candidatados
@endforelse
</table>