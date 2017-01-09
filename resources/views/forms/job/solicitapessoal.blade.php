{!! Form::open(array('url' => '/jobs/'.$id.'/sp', 'class'=>'form-horizontal')) !!}
<div class="col-md-2">
    {!! Form::label('cargo', 'Cargo', array('class' => 'control-label')) !!}
    <select name="cargo" class="form-control selectpicker" style="margin: 3px;">
        @forelse($cargos as $cargo)
            <option value="{{$cargo->id}}">{{$cargo->nome}}</option>
        @empty
            <option>Sem cargo Cadastrado</option>
        @endforelse
    </select>
</div>

<div class="col-md-2">
    {!! Form::label('regime', 'Regime', array('class' => 'control-label')) !!}
    <select name="regime" class="form-control selectpicker" style="margin: 3px;" required>

        @forelse($r as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
        @empty
            <p>Sem tipos de ajuda</p>
        @endforelse
    </select>
</div>

<div class="col-md-2">
    {!! Form::label('contratante', 'Contratante', array('class' => 'control-label')) !!}
    <select name="contratante" class="form-control selectpicker" style="margin: 3px;">
        <option value="1">Omnis</option>
        <option value="2">Parceiro</option>
    </select>
</div>

<div class="col-md-2">
    {!! Form::label('qtd', 'Quantidade', array('class' => 'control-label')) !!}
    <input name="qtd" class="form-control" type="text" placeholder="Qtd" required>

    <div id="qtddias" style="display: none;">
        {!! Form::label('valor', 'Qtd de Dias', array('class' => 'control-label')) !!}
        <input name="dias" class="form-control" type="text" placeholder="Dias" required disabled id="dias" onkeyup="calctotalvaga();" onchange="calctotalvaga();">

    </div>


</div>
<div class="col-md-2">
    {!! Form::label('periodo', 'Periodo', array('class' => 'control-label')) !!}
    <select name="periodo" class="form-control selectpicker" style="margin: 3px;" id="pediodo_vaga" onchange="ondiaria();">
        <option value="1">Mensal</option>
        <option value="2">Diario</option>
        <option value="3">Unico</option>
    </select>

    <div id="valordiaria" style="display: none;">
        {!! Form::label('valor', 'Valor diaria', array('class' => 'control-label')) !!}
        <input name="valor_diaria" class="form-control" type="text" placeholder="Valor" required disabled id="valor_diaria" onkeyup="calctotalvaga();" onchange="calctotalvaga();">

    </div>

</div>

<div class="col-md-2">
    {!! Form::label('valor', 'Valor Total', array('class' => 'control-label')) !!}
    <input name="valor" class="form-control" type="text" placeholder="Valor" requireds id="valortotal">

</div>


<div class="col-md-2">
    {!! Form::label('custo', 'Custo', array('class' => 'control-label')) !!}
    <input name="custo" class="form-control" type="text" placeholder="Custo efetivo" required>
</div>
<div class="col-md-12">
    <button type="submit" class="btn btn-primary pull-left">Adicionar</button>
</div>

{!! Form::close() !!}

@section('script')
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
@endsection