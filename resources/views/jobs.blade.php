@extends('layouts.dashboard')
@section('title')
    Jobs
@endsection
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="pull-right" style="margin-top: 3px; margin-right: 3px">

                        <a href="{{URL::route('novojob')}}"><button class="btn btn-success ">Novo Job</button></a>
                    </div>
                    <div class="panel-heading">Jobs</div>
                    <div class="panel-body">
                        @include('list.listajobs')
                    </div>
                </div>

            </div>
        </div>

@endsection
