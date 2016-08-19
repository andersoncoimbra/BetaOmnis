<table class="table">
    <tr>
        <th>Job</th>
        <th>Informação</th>
    </tr>
    @forelse($jobs as $job)
        <tr><td>{{$job->nomeJob}}</td><td><a href="{{url('/jobs/'.$job->id)}}"><button class="btn btn-info">Detalhes</button></a></td></tr>
        @empty
        <h1>Sem jobs cadastros</h1>
    @endforelse

</table>