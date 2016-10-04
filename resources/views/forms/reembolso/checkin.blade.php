<table class="table">
    <tr>
        <th>Registrador Por</th><td>{{$reembolso->criador}}</td>
    </tr>
    <tr>
        <th>Data de Criação</th><td>{{date('d/m/y', strtotime(str_replace('-','/',$reembolso->created_at)))}}</td>
    </tr>
    <tr>
        <th>Ultimo usuário</th><td>{{$reembolso->atualizador}}</td>
    </tr>
    <tr>
        <th>Data de Atualização</th><td>{{date('d/m/y H:i', strtotime(str_replace('-','/',$reembolso->updated_at)))}}</td>
    </tr>
    <tr>
        <th>Job</th><td>{{$reembolso->job}}</td>
    </tr>
    <tr>
        <th>Valor</th><td>{{$reembolso->valor}}</td>
    </tr>

</table>


{!! Form::model($reembolso, array( 'class'=>'form-horizontal', 'route'=> array('reembolso.update.checkin', $reembolso->id))) !!}
<div class="form-group">
    {!! Form::label('data_envio', 'Data de Envio', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        <input name="data_envio"  class="form-control" type="date" value="{{date('d/m/y', strtotime(str_replace('-','/',$reembolso->data)))}}">

    </div>
</div>
<div class="form-group">
    {!! Form::label('identificador', 'Rastreador', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('identificador', null,array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fornecedor', 'Fornecedor', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('fornecedor', null,array('class'=>'form-control')) !!}
    </div>
</div>




<div class="form-group">
    {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textArea('obs', null,array('class'=>'form-control')) !!}

    </div>
</div>

<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Registrar">

</div>
{!! Form::close() !!}




