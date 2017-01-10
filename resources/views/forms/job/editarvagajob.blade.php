<!-- Um Form model com multiplos parametros para a url na mesma ordens da necessidade da url do post -->
{!! Form::model($vagajob, array('route' => array('post.editar.vaga', $id, $vagajob->id))) !!}

<div class="form-group col-md-6">
    {!! Form::label('cargo', 'Cargo', array('class' => 'control-label')) !!}
    <select name="cargo" class="form-control selectpicker" style="margin: 3px;">
        @forelse($cargos as $cargo)
            @if($vagajob->cargo == $cargo->id)
                <option value="{{$cargo->id}}" selected>{{$cargo->nome}}</option>
            @else
            <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
            @endif
        @empty
            <option>Sem cargo Cadastrado</option>
        @endforelse
    </select>
</div>

<div class="form-group col-md-6">
    {!! Form::label('regime', 'Regime', array('class' => 'control-label')) !!}
    <select name="regime" class="form-control selectpicker" style="margin: 3px;" required>

        @forelse($r as $key => $value)
            @if($key == $vagajob->regime)
            <option value="{{$key}}" selected>{{$value}}</option>
            @else
                <option value="{{$key}}">{{$value}}</option>
            @endif
            @empty
            <p>Sem tipos de ajuda</p>
        @endforelse
    </select>
</div>

<div class="form-group col-md-6">
    {!! Form::label('contratante', 'Contratante', array('class' => 'control-label')) !!}
    <select name="contratante" class="form-control selectpicker" style="margin: 3px;">
        <option value="1" {{$vagajob->contratante == 1? "selected":""}}>Omnis</option>
        <option value="2" {{$vagajob->contratante == 2? "selected":""}}>Parceiro</option>
    </select>
</div>

<div class="form-group col-md-6">
    {!! Form::label('quantidade', 'Quantidade', array('class' => 'control-label')) !!}

    {!!Form::text('quantidade', null, array('class' => 'form-control', 'placeholder'=>'Quantidade', 'required')) !!}




</div>
<div class="form-group col-md-6" style="float: right; ">
    {!! Form::label('periodo', 'Periodo', array('class' => 'control-label')) !!}
    <select name="periodo" class="form-control selectpicker" style="margin: 3px;" id="pediodo_vaga" onchange="ondiaria();">
        <option value="1" {{$vagajob->periodo == 1? "selected":""}}>Mensal</option>
        <option value="2" {{$vagajob->periodo == 2? "selected":""}}>Diario</option>
        <option value="3" {{$vagajob->periodo == 3? "selected":""}}>Unico</option>
    </select>

    <div id="qtddias" style="display: none;">
        {!! Form::label('valor', 'Qtd de Dias', array('class' => 'control-label')) !!}


       <input name="dias" class="form-control" type="text" placeholder="Dias" required disabled id="dias" onkeyup="calctotalvaga();" onchange="calctotalvaga();">


    </div>

    <div id="valordiaria" style="display: none;">
        {!! Form::label('valor', 'Valor diaria', array('class' => 'control-label')) !!}
        <input name="valor_diaria" class="form-control" type="text" placeholder="Valor" required disabled id="valor_diaria" onkeyup="calctotalvaga();" onchange="calctotalvaga();">

    </div>

</div>

<div class="form-group col-md-6">
    {!! Form::label('valor', 'Valor Total', array('class' => 'control-label')) !!}
    {!!Form::text('valor', null, array('class' => 'form-control', 'placeholder'=>'Valor', 'required', 'onkeyup'=>'calctotalvaga();')) !!}

</div>


<div class="form-group col-md-6">
    {!! Form::label('custo', 'Custo', array('class' => 'control-label')) !!}

    {!!Form::text('custo', null, array('class' => 'form-control', 'placeholder'=>'Valor', 'required' )) !!}

</div>
<div class="modal-footer col-md-12">
    <button type="submit" class="btn btn-primary pull-right">Atualizar</button>
</div>

{!! Form::close() !!}


    <script type="application/javascript">
        function ondiaria() {
            var select = document.getElementById('pediodo_vaga');
            var dias = document.getElementById('dias');
            var valordiaria = document.getElementById('valor_diaria');


            if(select.options[select.selectedIndex].text == 'Diario')
            {
                dias.disabled = false;
                valordiaria.disabled = false;
                showDiv('valordiaria');
                showDiv('qtddias');

            }
        }

        function calctotalvaga() {

            var formdias = document.getElementById('dias').value;
            var formvalordiaria =  document.getElementById('valor_diaria').value;
            console.log(formdias);
            console.log(formvalordiaria);

            document.getElementById('valortotal').value = formdias*formvalordiaria;


        }
    </script>
