@include('modal.cadastros.cadastroParceiroListagemJob')
<div class="col-md-12">
    <table class="table-responsive table table-striped">
        <caption>Lista de Parceiros</caption>
        <tr><th>#ID</th><th>Nome do Parceiro</th><th>CNPJ</th><th>Jobs</th></tr>
        @forelse($parceiro as $parceiro)
            <tr><td>{{$parceiro->id}}</td><td>{{$parceiro->nome}}</td><td>{{$parceiro->cnpj}}</td><th><button class="btn btn-info" onclick="formModal('jobs','{{$parceiro->id}}','parceiros')">Jobs</button></th></tr>
        @empty
            <tr><td>Sem parceiros Cadastrado</td></tr>
        @endforelse
    </table>
</div>