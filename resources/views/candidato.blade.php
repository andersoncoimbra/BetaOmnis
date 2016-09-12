@extends('layouts.dashboard')
@section('title')
Cadastro de Candidatos
@endsection
@section('content')
    <button class="btn btn-info pull-right" onclick="newcandidato();">Novo Candidato</button>
    Lista de cadastro de pessoal<br>
    @include('list.cadastros.listcandidatos')
@endsection
@include('modal.cadastros.cadastrodecandidato')

@section('script')
    <script type="text/javascript">
        function newcandidato() {
            $('#new-candidato').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/cadastros/candidato/new')}}'
                }).done(function (html) {

                    $('#new-candidato').html(html);

                })
                $('#modal-candidato').modal('show');

            });
        }
    </script>
@endsection
