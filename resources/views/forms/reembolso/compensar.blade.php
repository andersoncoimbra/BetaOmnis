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

</table>


{!! Form::model($reembolso, array( 'class'=>'form-horizontal', 'route'=> array('reembolso.update.checkin', $reembolso->id))) !!}
            <div class="form-group">
                {!! Form::label('recebido', 'Valor Recebido', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                    <input name="parceiro" class="form-control" type="text" placeholder="Escreva o nome do Parceiro">
                </div>
            </div>
            <div class="form-group">

            </div>

            <div class="form-group">
                {!! Form::label('data_pagamento', 'Data de Pagamento:', array('class' => 'col-sm-5 control-label')) !!}
                <div class="col-sm-4">
                    <input name="data_pagamento"  class="form-control" type="date" >
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('obs', 'Observações', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <textarea name="identificador" class="form-control" placeholder="Escreva o Observações"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Atualizador">

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>




