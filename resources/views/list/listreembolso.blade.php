<table class="table table-striped">
                            <tr><th>Parceiro</th><th>Job</th><th>Valor</th><th>Data</th><th>Ações</th></tr>
                            @forelse($reembolsos as $reembolso)
                                <tr><td>{{$reembolso->parceiro}}</td><td>{{$reembolso->job}}</td><td>{{$reembolso->valor}}</td><td>{{date('d / m / Y', strtotime($reembolso->data))}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="formModal('detalhes')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Check-in" onclick="formModal('checkin')" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-danger"  style="margin-right: 2px; margin-left: 2px" value="Quitação" onclick="formModal('compensar')"></td></tr>
                            @empty
                                <p>Sem registro de Reembolso</p>
                            @endforelse
</table>
