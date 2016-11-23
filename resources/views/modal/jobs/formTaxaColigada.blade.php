<div id="taxacoligada" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content col-md-10 ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                {!! Form::model($job, array('route' => array('taxacoligada',$job->id), 'class'=>'form-horizontal')) !!}

            </div>
            <div id="editar_job">
                {!! Form::label('', 'Calcular taxa da coligada', array('class' => 'col-sm-12 control-label')) !!}

            </div>

                <div class="form-group col-lg-12">


                    <div class="form-group">
                        {!! Form::label('percentual', 'Pecentual %', array('class' => 'col-sm-4 control-label')) !!}
                        <div class="col-sm-8">
                            {!! Form::text('percentual', null, array('class'=>'form-control')) !!}
                        </div>
                    </div>

                    Valor total: <input type="radio" name="total" value="Valor total" onclick="countChecked();"><br>
                    Valor Total de contratações: <input type="radio" name="total" value="Contratações" onclick="countChecked();"><br>
                    Valor Total contratações e extras <input type="radio" name="total" value="Extras" onclick="countChecked();"> <br>
                    {!! Form::label('taxacoligada', 'Valor Taxa Coligada', array('class' => 'col-sm-4 control-label')) !!}
                    <div class="col-sm-8">

                        {!! Form::text('valortaxacoligada', null, array('class'=>'form-control')) !!}
                    </div>
                </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-info pull-left" value="Calcular Taxa da Coligada">

            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>
