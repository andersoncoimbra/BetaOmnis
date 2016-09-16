@extends('layouts.dashboard')
@section('title')
    Cargos de Job
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div id="print" class="panel panel-default">
                <div class="panel-heading">
                    Lista de Cagos de Job
                    <button class="btn btn-info pull-right" onclick="addcargo();">Novo Cargo</button>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr><th>#ID</th><th>Nome</th></tr>
                        @forelse($funcoes as $funcao)
                            <tr><td>{{$funcao->id}}</td><td>{{$funcao->nome}}</td></tr>
                        @empty
                            <h3>sem cargos cadastrado</h3>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
@include('modal.cadastros.modaladdfuncao')

@section('script')

    <script type="text/javascript">
        function addcargo() {
            $('#new-funcao').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/cadastros/funcoes/newcargo')}}'
                }).done(function (html) {

                    $('#new-funcao').html(html);

                })
                $('#modal-funcao').modal('show');

            });
        }
    </script>
    @endsection
