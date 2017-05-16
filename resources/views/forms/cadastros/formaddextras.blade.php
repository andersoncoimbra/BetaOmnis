{!! Form::open(array('url'=> route('post.new.extras.vagajob'), 'class'=>'form-horizontal')) !!}
{!! Form::label('nome', 'Nome:', array('class' => 'control-label')) !!}
{!! Form::text('nome', null,array('class' => 'form-control')) !!}
{!! Form::submit('Cadastrar',array('class' => 'btn btn-info')) !!}
{!! Form::close() !!}