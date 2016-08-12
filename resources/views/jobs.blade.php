@extends('layouts.dashboard')
@section('title')
    Jobs
@endsection
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Jobs</div>
                    <div class="panel-body">
                        @include('layouts.listajobs')
                    </div>
                </div>

            </div>
        </div>

@endsection
