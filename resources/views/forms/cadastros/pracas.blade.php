@extends('layouts.dashboard')
@section('title')
    Praças
@endsection

@section('content')
    <div id="form_add_jobs" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content col-md-10 ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Lista de Job</h4>
                </div>
                <div id="pracas-jobs">
                    <h1>Detalhes</h1>
                </div>

            </div>
        </div>
    </div>

    <div id="form_add_pracas" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title">Nova Praça</h4>
            </div>
            {!! Form::open(array('url' => '/cadastros/pracas', 'class'=>'form-horizontal')) !!}
            <div class="modal-body">

                {!! Form::label('nome', 'Nome do pracas', array('class' => 'control-label')) !!}
                <input type="text" name="nome" class="form-control" required>

                {!! Form::label('estado', 'Estado da Praça', array('class' => 'control-label')) !!}
                <select name="estado" class="form-control" required>
                    <option value="">Selecione</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espirito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success pull-right" value="Adicionar pracas">
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<button type="button" onclick="addpracas()" class="btn btn-primary pull-right" >Novo Praça</button>

<div class="col-md-12">
    <table class="table-responsive table table-striped">
        <caption>Lista de pracas</caption>
        <tr><th>#ID</th><th>Nome do pracas</th><th>UF</th><th>Jobs</th></tr>
        @forelse($pracas as $praca)
            <tr><td>{{$praca->id}}</td><td>{{$praca->nome}}</td><td>{{$praca->estado}}</td><td><button class="btn btn-info" onclick="formModal('jobs','{{$praca->id}}','pracas')">Jobs</button></td></tr>
        @empty
            <tr><td>Sem pracas Cadastrado</td></tr>
        @endforelse
    </table>
</div>
 @endsection

@section('script')
    <script type="text/javascript">
        function addpracas() {
            $(document).ready(function () {
                $('#form_add_pracas').modal('show');
            })
        }
    </script>
@endSection