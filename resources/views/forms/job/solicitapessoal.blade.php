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
    <select name="regime" class="form-control selectpicker" style="margin: 3px;">

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
    <input name="qtd" class="form-control" type="text" placeholder="Qtd">

</div>
<div class="col-md-2">
    {!! Form::label('periodo', 'Periodo', array('class' => 'control-label')) !!}
    <select name="periodo" class="form-control selectpicker" style="margin: 3px;">
        <option value="1">Mensal</option>
        <option value="2">Diario</option>
        <option value="3">Unico</option>
    </select>
</div>

<div class="col-md-2">
    {!! Form::label('valor', 'Valor', array('class' => 'control-label')) !!}
    <input name="valor" class="form-control" type="text" placeholder="Valor">

</div>

<div class="col-md-2">
    {!! Form::label('custo', 'Custo', array('class' => 'control-label')) !!}
    <input name="custo" class="form-control" type="text" placeholder="Custo efetivo">
</div>
<div class="col-md-12">
    <button type="submit" class="btn btn-primary pull-left">Adicionar</button>
</div>

{!! Form::close() !!}