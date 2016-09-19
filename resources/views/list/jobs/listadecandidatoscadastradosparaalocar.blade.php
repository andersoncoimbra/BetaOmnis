@section('script')
    {!! Html::style('/assets/css/jquery.bdt.css') !!}
    {!! Html::script('/assets/js/jquery.sortelements.js') !!}
    {!! Html::script('/assets/js/jquery.bdt.js') !!}
    <script>
        $(document).ready( function () {
            $('#listacandidatos').bdt();
        });
    </script>
@endsection

<table class="table" id="listacandidatos">

    <tr><th>#ID</th><th>Nome</th><th>Telefone</th><th>Ações</th></tr>
    @forelse($candidatos as $candidato)
        <tr><td>{{$candidato->id}}</td><td>{{$candidato->nome}}</td><td>{{$candidato->telefone}}</td><td><button class="btn btn-info">Alocar ao Job</button></td></tr>
    @empty
        Sem candidatados
    @endforelse
</table>