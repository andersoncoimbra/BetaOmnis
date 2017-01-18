<div id="imposto" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content col-md-10 ">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <br>
            Calculo de imposto
                {!! Form::model($job, array('route' => array('imposto',$job->id), 'class'=>'form-horizontal')) !!}
            <div class="form-group col-lg-12">
                <br>
                {!! Form::label('percentualimposto', 'Percentual %', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">
                {!! Form::text('percentualimposto', null, array('class'=>'form-control', 'onchange'=>'imposto();', 'onkeyup'=>'imposto();')) !!}
                </div>
                Valor total: <input type="radio" name="totalimposto" value="Valor total" onclick="imposto();" disabled ><br>
                Valor Total de contratações: <input type="radio" name="totalimposto" value="Contratações" disabled onclick="imposto();"><br>

                {!! Form::label('imposto', 'Valor do Imposto', array('class' => 'col-sm-4 control-label')) !!}
                <div class="col-sm-8">

                {!! Form::text('inputimposto', null, array('class'=>'form-control')) !!}
                </div>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-info pull-left" value="Calcular Imposto">

            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>
