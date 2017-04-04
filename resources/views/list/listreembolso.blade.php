<table class="table table-striped">
                            <tr><th>Descrição</th><th>Valor</th><th>Data</th><th>Ações</th></tr>
                            @forelse($reembolsos as $reembolso)
                                <tr><td>
                                        {{substr($reembolso->obs, 0, 32)}}
                                        @if(strlen($reembolso->obs) > 31)
                                            ...
                                            @endif
                                    </td><td>{{$reembolso->valor}}</td><td>{{date('d / m / Y', strtotime($reembolso->data))}}</td><td><button class="btn btn-info"  onclick="detalhesreembolso({{$reembolso->id}})" style="margin-right: 2px; margin-left: 2px" >Detalhes</button><button class="btn btn-primary"  onclick="checkinreembolso({{$reembolso->id}})" style="margin-right: 2px; margin-left: 2px" >Check-in</button>
                                        @if($reembolso->identificador)
                                        <button  class="btn btn-danger"  style="margin-right: 2px; margin-left: 2px" onclick="quitacaoreembolso({{$reembolso->id}})">Quitação</button>
                                        @endif
                                    </td></tr>
                            @empty
                                <p>Sem registro de Reembolso</p>
                            @endforelse
</table>


