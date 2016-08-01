<div>
    <table class="table">
        <tr><th>Data de registro</th><th>Data de Atualização</th></tr>
        <tr><td>{{date('d / m / Y', strtotime($faturamento->created_at))}}</td><td>{{date('d / m / Y', strtotime($faturamento->update_at))}}</td></tr>
        <tr><th>Ultimo usuário</th><th>Status</th></tr>
        <tr><td>{{$faturamento->lastuser}}</td><td>{{$faturamento->status}}</td></tr>

    </table>
</div>
{!! Form::model($faturamento, array('route' => array('faturamento.detalhes',$faturamento), 'class'=>'form-horizontal')) !!}
<div class="form-group">
    {!! Form::label('parceiro', 'Nome do Parceiro', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::text('parceiro', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('job', 'Nome do Job', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::text('job', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('valor', 'Valor:', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::text('valor', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('data', 'Data', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::text('data', null, array('class'=>'form-control', 'type'=>'date')) !!}
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
        {!! Form::text('obs', null, array('class' => 'form-control')) !!}    </div>
</div>

<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Registrar">

</div>
{!! Form::close() !!}