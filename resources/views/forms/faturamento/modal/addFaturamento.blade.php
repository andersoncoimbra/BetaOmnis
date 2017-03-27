<div id="form_add_faturamento" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content col-md-10 ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Novo Faturamento</h4>
            </div>

            {!! Form::open(array('url' => '/faturamento', 'class'=>'form-horizontal')) !!}
            <div class="form-group">
                {!! Form::label('parceiro', 'Nome do Parceiro', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <input name="parceiro" class="form-control" type="text" placeholder="Escreva o nome do Parceiro" x-moz-errormessage="Prencha o nome do parceiro" required>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('job', 'Nome do Job', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <input name="job" class="form-control" type="text" placeholder="Escreva o nome do Job" x-moz-errormessage="Prencha o nome do Job" required>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor:', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="valor"  class="form-control" type="text" placeholder="9999,99" x-moz-errormessage="Prencha o valor" required>
                </div>
                {!! Form::label('data', 'Data para Faturamento', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="datafaturamento"  class="form-control" type="date" placeholder="Data 12 / 07 / 2016" x-moz-errormessage="Prencha a data para faturamento" required>
                </div>
            </div>


        <!--
    <div class="form-group">
        {!! Form::label('fornecedor', 'Nome do Fornecedor', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <input name="fornecedor" class="form-control" type="text" placeholder="Escreva o nome fornecedor">
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('identificador', 'Identidficador', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <input name="identificador" class="form-control" type="text" placeholder="Escreva o Identificador">
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('dataenvio', 'Data de Envio', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="dataenvio"  class="form-control" type="date" placeholder="12 / 07 / 2016">
                </div>
            </div>
            -->

            <div class="form-group">
                {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <textarea name="obs" class="form-control" placeholder="Escreva o Observações"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" >Registrar</button>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>







