
{!! Form::model($faturamento, array('route' => array('faturamento.nf',$faturamento), 'class'=>'form-horizontal')) !!}
<div class="form-group">
    {!! Form::label('nf', 'Numero da NF', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::text('nf', null, array('class'=>'form-control', 'placeholder'=>'Escreva o numero da Nota Fiscal')) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('valorfaturado', 'Valor:', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('valorfaturado', null, array('class'=>'form-control', 'placeholder'=>'9999,99')) !!}

    </div>
    {!! Form::label('valorliquido', 'Liquido', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('valorliquido', null, array('class'=>'form-control', 'placeholder'=>'9999,99')) !!}
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
        <input name="datafaturamento"  class="form-control" type="date" placeholder="12 / 07 / 2016" value="{{$faturamento->datafaturamento}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('obs', null, array('class'=>'form-control', 'placeholder'=>'Observações')) !!}
    </div>
</div>

<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Registrar">

</div>



{!! Form::close() !!}




