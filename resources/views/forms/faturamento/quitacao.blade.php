

{!! Form::model($faturamento, array('route' => array('faturamento.quitacao',$faturamento->id), 'class'=>'form-horizontal')) !!}
<div class="form-group">
    {!! Form::label('valor', 'Valor Recebido:', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        <input name="valor"  class="form-control" type="text" placeholder="9999,99">
    </div>
</div>

<div class="form-group">
    {!! Form::label('data', 'Data de Recebimento', array('class' => 'col-sm-2 control-label')) !!}
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
    {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        <textarea name="identificador" class="form-control" placeholder="Escreva o Observações"></textarea>
    </div>
</div>

<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Registrar Compensação">

</div>
{!! Form::close() !!}