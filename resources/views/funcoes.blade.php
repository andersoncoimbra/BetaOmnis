@extends('layouts.dashboard')
@section('title')
    Cargos de Job
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div id="print" class="panel panel-default">
                <div class="panel-heading">
                    Lista de Cargos de Job
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

        <div class="col-md-6">
            <div id="print" class="panel panel-default">
                <div class="panel-heading">
                    Lista de Extras Cargos de Job
                    <button class="btn btn-info pull-right" onclick="addextras();">Novo Extra</button>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr><th>#ID</th><th>Nome</th></tr>
                        @forelse($extras as $extra)
                            <tr><td>{{$extra->id}}</td><td>{{$extra->nome}}</td></tr>
                        @empty
                            <h3>sem extras cadastrado</h3>
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

        function addextras() {
            $('#new-funcao').html("Carregando...");
            $('#titlefuncao').html("Extra de Vagas de Job");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/cadastros/funcoes/newextras')}}'
                }).done(function (html) {


                    $('#new-funcao').html(html);

                })
                $('#modal-funcao').modal('show');

            });
        }
    </script>
    @endsection
