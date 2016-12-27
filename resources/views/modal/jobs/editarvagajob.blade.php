<div id="editar_vagajob" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content col-md-10 ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Atualizar Job</h4>
            </div>
            <div id="editar_vaga">
                <h1>Detalhes</h1>
            </div>



        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        function editarvaga(id, idv) {
            $("#editar_vaga").html("");
            $(document).ready(function () {
                $.ajax({
                    url: '{{URL::to('/jobs')}}'+'/'+id+'/sp/'+idv+'/editar'
                }).done(function (html) {

                    $("#editar_vaga").html(html);
                    //$("#editar_vaga").html("ok teste funcionando");

                })
            });
            $(document).ready(function () {
                $('#editar_vagajob').modal('show');
            })
        }

    </script>
@endsection