@section('script')
    {!! Html::style('/assets/css/jquery.bdt.css') !!}
    {!! Html::script('/assets/js/jquery.sortelements.js') !!}
    {!! Html::script('/assets/js/jquery.bdt.js') !!}
    <script>
        $(document).ready( function () {
            $('#listajobs').bdt({
                pageFieldText: 'Registros por Pagina '
            });
        });
    </script>
@endsection
<table class="table table-striped" id="listajobs">
    <tr><th>ID</th> <th>Job</th> <th>Parceiro</th> <th>Inicio</th> <th>Fim</th>  <th>Status</th> <th>Ações</th></tr>
    @forelse($jobs as $job)
        <tr><td>{{$job->id}}</td> <td>{{$job->nomeJob}}</td>
            <td>{{$job->parceiros->nome}}</td>
            <td>{{date('d/m/Y', strtotime($job->inicio))}}</td>
            <td>{{date('d/m/Y', strtotime($job->fim))}}</td> <td>{{$ds[$job->status]}}</td> <td><a href="{{url()->current()}}/{{$job->id}}"> <button type="button" class="btn btn-danger">Detalhes</button></a></td></tr>
    @empty
        <tr><td>Sem Jobs</td></tr>
    @endforelse
</table>