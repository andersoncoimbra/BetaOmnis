<div>
    <table class="table">
        <tr><th>Identificação:</th><td>{{$faturamento->id}}</td></tr>
        <tr><th>Data de registro</th><th>Ultima Atualização</th></tr>
        <tr><td>{{date('d / m / Y', strtotime($faturamento->created_at))}}</td><td>{{date('d / m / Y H:s', strtotime($faturamento->updated_at))}}</td></tr>
        <tr><th>Ultimo usuário</th><th>Status</th></tr>
        <tr><td>{{$faturamento->lastuser}}</td><td class="@if($faturamento->nf<1) danger @else success @endif">{{$faturamento->status}}</td></tr>
        @if($faturamento->valorrecebido > 0)
            <tr><th>Valor Pago</th><th>Data de pagamento</th></tr>
            <tr><td>R$ {{$faturamento->valorrecebido}}</td><td>{{$faturamento->datapagamento}}</td></tr>
        @endif


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
{!! $dp = null !!}
@if($faturamento->datafaturamento)
    <?php $dp = date('d/m/Y', strtotime($faturamento->datafaturamento))?>
    @endforelse
<div class="form-group">
    {!! Form::label('datafaturamento', 'Data para Faturamento', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::date('datafaturamento', $dp, array('class'=>'form-control', 'placeholder'=>'Ex: 01/11/2016')) !!}
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
        {!! Form::text('obs', null, array('class' => 'form-control', '')) !!}
    </div>
</div>

<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Atualizar" {{$faturamento->status == 'Quitado'?'disabled':null}}>

</div>
{!! Form::close() !!}