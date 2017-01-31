<div id="ajax_form_add_parceiro" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title">Novo Parceiro</h4>
            </div>
            {!! Form::open(array('url' => '/cadastros/parceiros', 'class'=>'form-horizontal', 'name'=>'formaddparceiro', 'id'=>'formaddparceiro')) !!}
            <div class="modal-body">

                {!! Form::label('nome', 'Nome do parceiro', array('class' => 'control-label')) !!}
                <input type="text" name="nome" class="form-control">

                {!! Form::label('nome', 'Cnpj do parceiro', array('class' => 'control-label')) !!}
                <input type="text" name="cnpj" class="form-control" placeholder="Ex: 12.123.123/0001-12">
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-success pull-right" onclick="addajaxparceiro();" value="Adicionar Parceiro">
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div id="cadastrado" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <h3>Cadastrado com sucesso</h3>
            <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close" style="width: 100%">OK</button>
            </div>
        </div>
    </div>
</div>

<div id="falha" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <h3>Falha ao cadastrar</h3>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" style="width: 100%">OK</button>
            </div>
        </div>
    </div>
</div>