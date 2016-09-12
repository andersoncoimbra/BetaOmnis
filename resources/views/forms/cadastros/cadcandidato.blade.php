<div class="form-horizontal">
    {!! Form::open(array('url' => '/jobs', 'class'=>'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Nome Candidato', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <input name="nome" class="form-control" type="text" placeholder="Escreva o nome do Candidato">
        </div>
    </div>
     <div class="form-group">
         {!! Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
             <input name="email" class="form-control" type="text" placeholder="Email do Candidato">
         </div>
    </div>

    <div class="form-group">
        {!! Form::label('idade', 'Idade', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="idade"  class="form-control" type="number" placeholder="Idade do candidato">
        </div>



        {!! Form::label('telefone', 'Telefone', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="telefone" class="form-control" type="text" placeholder="Telefone">
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('sexo', 'Sexo', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <select name="sexo" class="form-control" >
                <option selected="selected" value="">Selecione o sexo</option>
                <option value="true">Masculino</option><option value="false">Feminino</option>
            </select>
        </div>
    </div>



<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Registrar">

</div>
    {!! Form::close() !!}
</div>

