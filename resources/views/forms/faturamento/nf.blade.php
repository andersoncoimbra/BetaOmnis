<div>
    <table class="table">
        <tr><th>Valor Fechado</th><th>Data do Faturamento</th></tr>
        <tr><td>R$ {{$faturamento->valor}}</td><td>{{date('d / m / Y', strtotime($faturamento->datafaturamento))}}</td></tr>
        <tr><th>Ultimo usuário</th><th>Status</th></tr>
        <tr><td>{{$faturamento->lastuser}}</td><td class="{!! $faturamento->nf<1? 'danger' : 'success' !!}">{{$faturamento->status}}</td></tr>
    </table>
</div>
<hr>
{!! Form::model($faturamento, array('route' => array('faturamento.nf',$faturamento), 'class'=>'form-horizontal')) !!}
<div class="form-group">
    {!! Form::label('nf', 'Numero da NF', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::text('nf', null, array('class'=>'form-control', 'placeholder'=>'Escreva o numero da Nota Fiscal', 'x-moz-errormessage'=>'Preencha o numero da nota fiscal','required'=>'')) !!}
    </div>
</div>

<hr>
<div class="form-group">
    {!! Form::label('valorfaturado', 'Valor NF:', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! Form::text('valorfaturado', null, array('class'=>'form-control', 'placeholder'=>'9999,99','x-moz-errormessage'=>'Preencha o valor da nota Fiscal','required'=>'')) !!}
    </div>
</div>
<div class="form-group">
{!! Form::label('valorliquido', 'Valor liquido', array('class' => 'col-sm-4 control-label')) !!}
<div class="col-sm-8">
    {!! Form::text('valorliquido', null, array('class'=>'form-control', 'placeholder'=>'9999,99', 'x-moz-errormessage'=>'Preencha o Valor liquido da nota fiscal','required'=>'')) !!}
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
    {!! Form::label('data', 'Data de Vencimento', array('class' => 'col-sm-4 control-label')) !!}
    <div class="col-sm-8">
        {!! $dp = null !!}
        @if($faturamento->data)
            <?php $dp = date('d/m/Y', strtotime($faturamento->data))?>
            @endforelse
        {!! Form::date('data', $dp, array('class'=>'form-control', 'placeholder'=>'Ex: 01/11/2016', 'x-moz-errormessage'=>'Preencha a data de vencimento da nota fiscal','required'=>'')) !!}

    </div>
</div>

<div id="impostos" style="display: none">
    <div class="form-group">
        {!! Form::label('iss', 'ISS', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('iss', null, array('class'=>'form-control', 'placeholder'=>'ISS')) !!}
        </div>
        {!! Form::label('inss', 'INSS', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('inss', null, array('class'=>'form-control', 'placeholder'=>'INSS')) !!}
        </div>
        {!! Form::label('ir', 'IR', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('ir', null, array('class'=>'form-control', 'placeholder'=>'IR')) !!}
        </div>
        {!! Form::label('csll', 'CSLL', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('csll', null, array('class'=>'form-control', 'placeholder'=>'CSLL')) !!}
        </div>
        {!! Form::label('pis', 'PIS', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('pis', null, array('class'=>'form-control', 'placeholder'=>'PIS')) !!}
        </div>
        {!! Form::label('cofins', 'COFINS', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('cofins', null, array('class'=>'form-control', 'placeholder'=>'Cofins')) !!}
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('obs', null, array('class'=>'form-control')) !!}
    </div>
</div>


<div class="modal-footer">
    <input type="button" class="btn btn-success pull-left" value="Impostos" {{$faturamento->status == 'Quitado'?'disabled':null}} onclick="showDiv('impostos');">

    <input type="submit" class="btn btn-success" value="Atualizar" {{$faturamento->status == 'Quitado'?'disabled':null}}>

</div>



{!! Form::close() !!}




