<div class="form-horizontal">
    {!! Form::model($job, array('route' => array('post.editar.job',$job->id), 'class'=>'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('nomeJob', 'Nome do Job', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('nomeJob', null, array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('parceiro', 'Selecione o parceiro', array('class' => 'col-sm-4 control-label')) !!}
        <div class="col-sm-8">
            <select name="parceiro" class="form-control selectpicker" style="margin: 3px;">
                @forelse($parceiros as $parceiro)
                    @if($parceiro->id == $job->parceiros->id)
                        <option value="{{$parceiro->id}}" selected>{{$parceiro->nome}}</option>
                    @else
                        <option value="{{$parceiro->id}}">{{$parceiro->nome}}</option>
                    @endif
                @empty
                    <option value="0" >Serm Parceiro</option>
                @endforelse
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('praca', 'Selecione a praça', array('class' => 'col-sm-4 control-label')) !!}
        <div class="col-sm-8">
            <select name="praca" class="form-control selectpicker" style="margin: 3px;">
                @forelse($p as $value)
                    @if($value->id == $job->pracas->id)
                        <option value="{{$value->id}}" selected>{{$value->nome}}</option>
                    @else
                    <option value="{{$value->id}}">{{$value->nome}}</option>
                    @endif
                @empty
                    <option value="0" >Sem Praça</option>
                @endforelse
            </select>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('codpar', 'Coordenador Parceiro', array('class' => 'col-sm-3 control-label')) !!}
        <div class="col-sm-9">
            {!! Form::text('codnome', null, array('class'=>'form-control')) !!}

        </div>
    </div>

    <div class="form-group">
        {!! Form::label('codemail', 'Email', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('codemail', null, array('class'=>'form-control')) !!}
        </div>
    </div>


    <div class="form-group">
        {!! Form::label('codetele', 'Telefone', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('codtele', null, array('class'=>'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('nf', 'Nota fiscal', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <select name="nf" class="form-control" >
                @if($job->nf)
                    <option value="">Nota Fiscal</option>
                    <option value="1" selected="selected">Sim</option>
                    <option value="0">Não</option>
                    @else
                    <option value="">Nota Fiscal</option>
                    <option value="1" >Sim</option>
                    <option value="0" selected="selected">Não</option>
                    @endif
            </select>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('inicio', 'Data de Inicio', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('inicio', date('d/m/Y', strtotime(str_replace('/','-',$job->inicio))), array('class'=>'form-control')) !!}

        </div>

        {!! Form::label('fim', 'Data Fim', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('fim', date('d/m/Y', strtotime(str_replace('/','-',$job->fim))), array('class'=>'form-control')) !!}

        </div>
    </div>

    <div class="form-group">
        {!! Form::label('valor', 'Valor global R$:', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('valor', null, array('class'=>'form-control')) !!}

        </div>

        {!! Form::label('custo', 'Custo Previsto R$:', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-4">
            {!! Form::text('custo', null, array('class'=>'form-control')) !!}

        </div>
    </div>


    <div class="form-group">
        {!! Form::label('status', 'Status', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            <select name="status"  class="form-control" >
                <option selected="selected" value="0">Status</option>
                <option value="1">Orçamento</option>
                <option value="2">Standy by</option>
                <option value="3">Execução</option>
            </select>
        </div>
    </div>



    <div id="taxacoligada" style="display: none">
    <div class="form-group col-lg-12">


        <div class="form-group">
        {!! Form::label('', 'Calcular taxa da coligada', array('class' => 'col-sm-12 control-label')) !!}
        {!! Form::label('percentual', 'Pecentual %', array('class' => 'col-sm-4 control-label')) !!}
            <div class="col-sm-8">
        {!! Form::text('percentual', null, array('class'=>'form-control')) !!}
                </div>
        </div>

        Valor total: <input type="radio" name="total" value="Valor total"><br>
        Valor Total de contratações: <input type="radio" name="total" value="Contratações"><br>
        Valor Total contratações e extras <input type="radio" name="total" value="Extras"> <br>
            {!! Form::label('taxacoligada', 'Valor Taxa Coligada', array('class' => 'col-sm-4 control-label')) !!}
            <div class="col-sm-8">

                {!! Form::text('valortaxacoligada', null, array('class'=>'form-control')) !!}
            </div>
        </div>
    </div>

<div class="modal-footer">
    <input type="button" class="btn btn-info pull-left" onclick="showDiv('taxacoligada')" value="Calcular Taxa da Coligada">
    <input type="submit" class="btn btn-success" value="Atualizar">
    <input type="button" class="btn btn-danger" value="Cancelar" data-dismiss="modal">
</div>
    {!! Form::close() !!}
</div>

<script type="text/javascript">
    var countChecked = function() {

        var i = function (id) { return document.getElementsByName(id)[0]}
        var a = function (id) { return document.getElementsByName(id)}


        // O valor globlal esta sento registrado na view de
        // DetalhesJob como um metodo javascript no final do codigo
        console.log(valorglobal());
        console.log(i('valortaxacoligada').value);
        console.log(contratacoes());
        if(a('total')[0].checked) {
            i('valortaxacoligada').value = valorglobal() * (i('percentual').value / 100);
        }
        if(a('total')[1].checked) {
            i('valortaxacoligada').value = contratacoes() * (i('percentual').value / 100);
        }
        if(a('total')[2].checked) {
            i('valortaxacoligada').value =  (contratacoes()+ extras()) * (i('percentual').value / 100);;
        }


    };
    countChecked();

    $("input[type=radio]" ).on( "click", countChecked );
</script>
