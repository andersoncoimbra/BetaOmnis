<div id="editar_jobs" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content col-md-10 ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Atualizar Job</h4>
            </div>
            <div id="editar_job">
                <h1>Detalhes</h1>
            </div>



        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        function editarjob(id) {

            $(document).ready(function () {
            $.ajax({
                url: '{{URL::to('/jobs/editar')}}'+'/'+id
            }).done(function (html) {

                $("#editar_job").html(html);

            })
            });
            $(document).ready(function () {
                $('#editar_jobs').modal('show');
            })
        }
    </script>
@endsection