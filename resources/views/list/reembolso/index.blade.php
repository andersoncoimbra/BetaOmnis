@extends('layouts.dashboard')
@section('title')
    Relatório de reembolso
@endsection

@section('content')
    @include('modal.reembolso.addReembolso')
    @include('modal.reembolso.detalhes')
    @include('modal.reembolso.checkin')
    @include('modal.reembolso.quitacao')


    @include('forms.faturamento.modal.detalhes')

<table class="table table-striped">
    <tr><th>Parceiro</th><th>Job</th><th>Valor</th><th>Status</th><th>Ações</th></tr>
    @forelse($reembolsos as $reembolso)
        <tr><td>{{$reembolso->parceiro}}</td><td>
                {{substr($reembolso->job, 0, 32)}}
                @if(strlen($reembolso->job) > 31)
                    ...
                @endif
            </td><td>{{$reembolso->valor}}</td><td>{{$reembolso->status}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="detalhesreembolso({{$reembolso->id}})" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Check-in" onclick="checkinreembolso({{$reembolso->id}})" style="margin-right: 2px; margin-left: 2px" >
                @if($reembolso->identificador)
                    <input type="button" class="btn btn-danger"  style="margin-right: 2px; margin-left: 2px" value="Quitação" onclick="quitacaoreembolso({{$reembolso->id}})">
                @endif
            </td></tr>
    @empty
        <p>Sem registro de Reembolso</p>
    @endforelse
</table>

@endsection




@section('script')
    <script type="text/javascript">
        function newreembolso() {
            $('#novo-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/new/job/')}}'
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

    <script type="text/javascript">
        function quitacaoreembolso(id) {
            $('#quitacao-reembolso').html("Carregando...");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/reembolso/')}}/'+id+'/quitacao'
                }).done(function (html) {

                    $('#quitacao-reembolso').html(html);

                })
                $('#quitacao').modal('show');

            });
        }
    </script>

@endsection


