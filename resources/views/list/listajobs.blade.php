<table class="table table-striped">
    <tr><th>ID</th> <th>Job</th> <th>Parceiro</th> <th>Inicio</th> <th>Fim</th> <th>Valor</th><th>Custo previsto</th><th>Status</th> <th>Ações</th></tr>
    @forelse($jobs as $job)
        <tr><td>{{$job->id}}</td> <td>{{$job->nomeJob}}</td>
            <td>{{$job->parceiros->nome}}</td>
            <td>{{date('d / m / Y', strtotime($job->inicio))}}</td>
            <td>{{date('d / m / Y', strtotime($job->fim))}}</td><td>{{$job->valor}}</td> <td>{{$job->custo}}</td><td>{{$ds[$job->status]}}</td> <td><a href="{{url()->current()}}/{{$job->id}}"> <button type="button" class="btn btn-danger">Detalhes</button></a></td></tr>
    @empty
        <tr><td>Sem Jobs</td></tr>
    @endforelse
</table>