
<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Prestadores') }}
        </h2>
    </x-slot>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Email</th>
                <th>Apelido Profissional</th>
                <th>Gênero</th>
                <th>Data de Nascimento</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestadores as $prestador)
                <tr>
                    <td>{{ $prestador->name }}</td>
                    <td>{{ $prestador->email }}</td>
                    <td>{{ $prestador->apelidoprofissional }}</td>
                    <td>{{ $prestador->genero }}</td>
                    <td>{{ $prestador->datadenascimento }}</td>
                    <td>{{ $prestador->celular }}</td>
                    <td>
                        <!-- Botão Editar -->
                        <a href="{{ route('users.edit', $prestador->id) }}" class="btn btn-warning">Editar</a>

                        <!-- Botão Excluir -->
                        <form action="{{ route('users.destroy', $prestador->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este prestador?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Voltar</a>
</x-admin-layout>
