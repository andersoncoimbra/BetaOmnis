@extends('layouts.dashboard')
@section('title')
    Novo Usuario
    <button class="btn btn-info pull-right" onclick="newUser()">Novo Usuario</button>
@endsection
@section('content')
    @include('modal.cadastros.cadastronewusuario')
@include('list.cadastros.usuarios')
@endsection
@section('script')
    <script type="text/javascript">
        function newUser() {
    $('#new-usuario').html("Carregando...");
    $(document).ready(function () {
    $.ajax({
    url: '{{URL::to('/cadastros/usuarios/new')}}'
    }).done(function (html) {

    $('#new-usuario').html(html);

    })
    $('#modal-usuarios').modal('show');

    });
    }
    </script>
    @endsection
