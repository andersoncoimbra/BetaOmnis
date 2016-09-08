<table class="table">
    <caption>Lista de usuarios    </caption>
    <tr><th>#Id</th><th>Nome</th></tr>
    @forelse($users as $user)
        <tr><td>{{$user->id}}</td><td>{{$user->name}}</td><td>{{$user->email}}</td></tr>
    @empty
        Sem usuarios
    @endforelse

</table>