<!--
////////////////////////////////////////////////////
//Recursos não usado no sistema
////////////////////////////////////////////////////
-->
<div id="ajax_form_add_pracas" class="modal fade">
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
                <input type="button" class="btn btn-success pull-right"  value="Adicionar pracas">
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


