@extends('layouts.dashboard')
@section('title')
    Parceiros
    @endsection

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastros de Parceiros</div>

                    <div class="panel-body">
                        <button type="button" onclick="addparceiro()" class="btn btn-primary pull-right" >Novo Parceiro</button>

                        @include('forms.cadastros.addParceiro')
                    </div>
                </div>
            </div>
        </div>
@endsection
