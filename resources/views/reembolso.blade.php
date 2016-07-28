@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Reembolsos</div>
                    <div class="panel-body">
                        @include('forms.addReembolso')
                        @include('forms.detalhes')
                        @include('forms.checkin')
                        @include('forms.compensar')
                        @include('list.listreembolso')

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function formModal(tipo) {
            $(document).ready(function () {
                $('#form_add_'+tipo).modal('show');
            })
        }
    </script>
@endsection
