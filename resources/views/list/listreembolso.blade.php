<table class="table table-striped">
                            <tr><th>Parceiro</th><th>Job</th><th>Valor</th><th>Data</th><th>Ações</th></tr>
                            @forelse($reembolsos as $reembolso)
                                <tr><td>{{$reembolso->parceiro}}</td><td>
                                        {{substr($reembolso->job, 0, 32)}}
                                        @if(strlen($reembolso->job) > 31)
                                            ...
                                            @endif
                                    </td><td>{{$reembolso->valor}}</td><td>{{date('d / m / Y', strtotime($reembolso->data))}}</td><td><input type="button" class="btn btn-info" value="Detalhes" onclick="detalhesreembolso({{$reembolso->id}})" style="margin-right: 2px; margin-left: 2px" ><input type="button" class="btn btn-primary" value="Check-in" onclick="checkinreembolso({{$reembolso->id}})" style="margin-right: 2px; margin-left: 2px" >
                                        @if($reembolso->identificador)
                                        <input type="button" class="btn btn-danger"  style="margin-right: 2px; margin-left: 2px" value="Quitação" onclick="formModal('compensar')">
                                            @endif
                                    </td></tr>
                            @empty
                                <p>Sem registro de Reembolso</p>
                            @endforelse
</table>
