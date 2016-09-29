@extends('layouts.dashboard')

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Reembolsos</div>
                    <div class="panel-body">
                        <input type="button" class="btn btn-success pull-right" value="Novo Reembolso" onclick="newreembolso();" style="margin-bottom: 10px;">
                        @include('modal.reembolso.addReembolso')
                        @include('modal.reembolso.detalhes')
                        @include('modal.reembolso.checkin')
                        @include('forms.reembolso.compensar')
                        @include('list.listreembolso')
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('script')
    // As outras modais são acionadas em seu respectivos includes
    <script type="text/javascript">
        function newreembolso() {
            $('#novo-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/novo')}}'
                }).done(function (html) {

                    $('#novo-reembolso').html(html);

                })
                $('#modal-reembolso').modal('show');

            });
        }
    </script>
    <script type="text/javascript">
        function detalhesreembolso(id) {
            $('#detalhes-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/')}}/'+id+'/detalhes'
                }).done(function (html) {

                    $('#detalhes-reembolso').html(html);

                })
                $('#detalhes').modal('show');

            });
        }
    </script>

    <script type="text/javascript">
        function checkinreembolso(id) {
            $('#detalhes-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/')}}/'+id+'/checkin'
                }).done(function (html) {

                    $('#checkin-reembolso').html(html);

                })
                $('#checkin').modal('show');

            });
        }
    </script>


@endsection
