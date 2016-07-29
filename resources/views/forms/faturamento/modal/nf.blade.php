<div id="form_add_nf" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content col-md-10 ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Nota Fiscal</h4>
            </div>

            {!! Form::open(array('url' => '/reembolso', 'class'=>'form-horizontal')) !!}
            <div class="form-group">
                {!! Form::label('nf', 'Numero da Nota Fiscal', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                    <input name="nf" class="form-control" type="text" placeholder="Escreva o numero da nota fiscal">
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('valorfaturamento', 'Valor:', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="valorfatturamento"  class="form-control" type="text" placeholder="9999,99">
                </div>
                {!! Form::label('data', 'Data', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="data"  class="form-control" type="date" placeholder="Data 12 / 07 / 2016">
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
                {!! Form::label('datafaturamento', 'Data de Faturamento', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                    <input name="datafaturamento"  class="form-control" type="date" placeholder="12 / 07 / 2016">
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <textarea name="identificador" class="form-control" placeholder="Escreva o Observações"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Registrar">

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>




