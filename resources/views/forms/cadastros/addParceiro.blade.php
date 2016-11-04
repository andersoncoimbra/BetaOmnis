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
@section('script')
<script type="text/javascript">
    function addparceiro() {
        $(document).ready(function () {
            $('#form_add_parceiro').modal('show');
        })
    }
</script>
@endsection