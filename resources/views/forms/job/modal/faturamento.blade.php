<div id="form_add_faturamento" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content col-md-10 ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Novo Faturamento</h4>
            </div>

            {!! Form::open(array('route' => 'jobs.faturamento', 'class'=>'form-horizontal')) !!}

            <div class="form-group">
                {!! Form::label('tipo', 'Tipo', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <select name="tipo" class="form-control" required>
                        <option value="0">Nota Fiscal</option>
                        <option value="1">Nota de Debito</option>
                    </select>

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('parceiro', 'Nome do Parceiro', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <input name="id_job" type="hidden" value="{{$job->id}}" >

                    <input name="parceiro" class="form-control" type="text" value="{{$job->parceiros->nome}}" x-moz-errormessage="Prencha o nome do parceiro" required hidden>

                </div>
            </div>
            <div class="form-group">
                {!! Form::label('job', 'Nome do Job', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    <input name="job" class="form-control" type="text" value="{{$job->nomeJob}}" x-moz-errormessage="Prencha o nome do Job" required hidden>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor:', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="valor"  class="form-control" type="text" placeholder="9999,99" x-moz-errormessage="Prencha o valor" required>
                </div>
                {!! Form::label('datafaturamento', 'Data para Faturamento', array('class' => 'col-sm-2 control-label')) !!}
                <div class="col-sm-4">
                    <input name="datafaturamento"  class="form-control" type="date" required>
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
                {!! Form::label('obs', 'Observações', array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-9">
                    <input name="obs" class="form-control" placeholder="Escreva o Observações">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" >Registrar</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
