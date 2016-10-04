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

    <tr>
        <th>Identificador</th><td>{{$reembolso->identificador}}</td>
    </tr>

    <tr>
        <th>Status</th><td>{{$reembolso->status}}</td>
    </tr>

</table>


{!! Form::model($reembolso, array( 'class'=>'form-horizontal', 'route'=> array('reembolso.update.quitacao', $reembolso->id))) !!}
            <div class="form-group">
                {!! Form::label('recibo', 'Valor Recebido', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                    {{Form::text('recibo', null, array('class' => 'col-sm-2 form-control')) }}

                </div>
            </div>
            <div class="form-group">
            </div>

            <div class="form-group">
                {!! Form::label('data_pagamento', 'Data de Pagamento:', array('class' => 'col-sm-5 control-label')) !!}
                <div class="col-sm-4">
                    <input type="date" name="data_pagamento" class="form-control col-sm-7" value="{{date('d/m/y', strtotime(str_replace('-','/',$reembolso->data_pagamento)))}}">
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {{Form::textarea('obs', null, array('class' => 'col-sm-2 form-control')) }}
                </div>
            </div>

            <div class="modal-footer">

                <input type="submit" class="btn btn-success" value="Atualizador">

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>




