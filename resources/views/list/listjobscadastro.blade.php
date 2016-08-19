<table class="table">
    <tr><th>Job</th><th>Informações</th></tr>
@forelse($jobs as $job)

        <tr><td>{{$job->nomeJob}}</td><td><a href="{{url('/jobs/'.$job->id)}}"><button class="btn btn-info">Detalhes</button></a></td></tr>


@empty
    <h3>Sem Jobs nessa Praça</h3>
@endforelse
</table>