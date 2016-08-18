<div id="form_add_parceiro" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title">Novo Parceiro</h4>
            </div>
            {!! Form::open(array('url' => '/cadastros/parceiros', 'class'=>'form-horizontal')) !!}
            <div class="modal-body">

                {!! Form::label('nome', 'Nome do parceiro', array('class' => 'control-label')) !!}
                <input type="text" name="nome" class="form-control">

                {!! Form::label('nome', 'Cnpj do parceiro', array('class' => 'control-label')) !!}
                <input type="text" name="cnpj" class="form-control" placeholder="Ex: 12.123.123/0001-12">
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success pull-right" value="Adicionar Parceiro">
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<button type="button" onclick="addparceiro()" class="btn btn-primary pull-right" >Novo Parceiro</button>

<div class="col-md-12">
    <table class="table-responsive table table-striped">
        <caption>Lista de Parceiros</caption>
        <tr><th>#ID</th><th>Nome do Parceiro</th><th>CNPJ</th></tr>
        @forelse($parceiro as $parceiro)
        <tr><td>{{$parceiro->id}}</td><td>{{$parceiro->nome}}</td><td>{{$parceiro->cnpj}}</td></tr>
        @empty
        <tr><td>Sem parceiros Cadastrado</td></tr>
        @endforelse
    </table>
</div>

@section('script')
<script type="text/javascript">
    function addparceiro() {
        $(document).ready(function () {
            $('#form_add_parceiro').modal('show');
        })
    }
</script>
@endsection