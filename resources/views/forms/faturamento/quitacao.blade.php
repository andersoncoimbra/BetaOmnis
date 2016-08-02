<div>
    <table class="table">
        <tr><th>Ultimo usuário</th><th>Status</th></tr>
        <tr><td>{{$faturamento->lastuser}}</td><td class="@if($faturamento->nf<1) danger @else success @endif">{{$faturamento->status}}</td></tr>
        <tr><th>Valor</th><th>Data do Vencimento</th></tr>
        <tr><td>R$ {{$faturamento->valor}}</td><td>{{date('d / m /Y', strtotime($faturamento->data))}}</td></tr>
        <tr><th>Valor da Nota</th><th>Valor Liquido</th></tr>
        <tr><td>R$: {{$faturamento->valorfaturado}}</td><td>R$: {{$faturamento->valorliquido}}</td></tr>
        <tr><th>Data de Faturamento</th><td>{{date('d/m/Y', strtotime($faturamento->datafaturamento))}}</td></tr>
    </table>
</div>

{!! Form::model($faturamento, array('route' => array('faturamento.quitacao',$faturamento->id), 'class'=>'form-horizontal')) !!}
<div class="form-group">
    {!! Form::label('valorrecebido', 'Valor Recebido:', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::text('valorrecebido', null, array('class'=>'form-control')) !!}

    </div>
</div>
{!! $dp = null !!}
@if($faturamento->datapagamento)
    <?php $dp = date('d/m/Y', strtotime($faturamento->datapagamento))?>
    @endforelse

<div class="form-group">
    {!! Form::label('datapagamento', 'Data de Recebimento', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-4">
        {!! Form::date('datapagamento', $dp, array('class'=>'form-control', 'placeholder'=>'Ex: 01/11/2016')) !!}

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
        {!! Form::text('obs', null, array('class'=>'form-control', 'placeholder'=>'Observações')) !!}
    </div>
</div>

<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Registrar Quitação" {{$faturamento->status == 'Quitado'?'disabled':null}}>

</div>
{!! Form::close() !!}