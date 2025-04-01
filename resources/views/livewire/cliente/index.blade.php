<div class="mt-5">
    {{-- margin top --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>cpf</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($cliente as $c)
                            <td> {{ $c->id }} </td>
                            <td> {{ $c->nome }} </td>
                            <td> {{ $c->cpf }} </td>
                            <td>
                                <a href="{{ route('cliente.edit', ['id' => $c->id]) }}"
                                    class="btn btn-info btn-sm">Editar Sem Modal</a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>