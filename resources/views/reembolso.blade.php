@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Reembolsos</div>
                    <div class="panel-body">
                        @include('forms.reembolso.addReembolso')
                        @include('forms.reembolso.detalhes')
                        @include('forms.reembolso.checkin')
                        @include('forms.reembolso.compensar')
                        @include('list.listreembolso')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')

@endsection
