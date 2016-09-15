<div class="form-horizontal">
    {!! Form::open(array('url' => '/cadastros/candidato/new', 'class'=>'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('nome', 'Nome Candidato', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <input name="nome" class="form-control" type="text" placeholder="Escreva o nome do Candidato" required>
        </div>
    </div>
     <div class="form-group">
         {!! Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) !!}
         <div class="col-sm-10">
             <input name="email" class="form-control" type="text" placeholder="Email do Candidato">
         </div>
    </div>

    <div class="form-group">
        {!! Form::label('datanascimento', 'Nascimento', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="datanascimento"  class="form-control" type="date" placeholder="Data de Nascimento" required>
        </div>



        {!! Form::label('telefone', 'Telefone', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            <input name="telefone" class="form-control" type="text" placeholder="Telefone" required>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('sexo', 'Sexo', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <select name="sexo" class="form-control" required>
                <option selected="selected">Selecione o sexo</option>
                <option value="true">Masculino</option><option value="false">Feminino</option>
            </select>
        </div>
    </div>



<div class="modal-footer">
    <input type="submit" class="btn btn-success" value="Registrar">

</div>
    {!! Form::close() !!}
</div>

