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
        <th>Data de Atualização</th><td>{{date('d/m/y H:m', strtotime(str_replace('-','/',$reembolso->updated_at)))}}</td>
    </tr>

</table>


{!! Form::model($reembolso, array( 'class'=>'form-horizontal', 'route'=> array('reembolso.update', $reembolso->id))) !!}
            <div class="form-group">
                {!! Form::label('parceiro', 'Nome do Parceiros', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('parceiro', null,array('class'=>'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('job', 'Nome do Job', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::text('job', null,array('class'=>'form-control')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor:', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    {!! Form::text('valor', null,array('class'=>'form-control')) !!}
                </div>
                {!! Form::label('data', 'Data', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="data"  class="form-control" type="date" value="{{date('d/m/y', strtotime(str_replace('-','/',$reembolso->data)))}}">
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
                    {!! Form::textArea('obs', null,array('class'=>'form-control')) !!}

                </div>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Registrar">

            </div>
            {!! Form::close() !!}




