{!! Form::open(array('url'=> url()->current(), 'class'=>'form-horizontal')) !!}
{!! Form::label('nome', 'Nome:', array('class' => 'control-label')) !!}
{!! Form::text('nome', null,array('class' => 'form-control')) !!}
{!! Form::submit('Cadastrar',array('class' => 'btn btn-info')) !!}
{!! Form::close() !!}