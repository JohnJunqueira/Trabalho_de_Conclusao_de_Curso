
<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Nome Completo</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Email</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Apelido</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Gênero</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Data de Nascimento</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Celular</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Ações para Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->name }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->email }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->apelidoprofissional }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->genero }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->datadenascimento }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->celular }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">

                    <!-- Botão Ver Ofertas -->
                    <a href="{{ route('ofertas.index', $cliente->id) }}" class="btn btn-warning">Ver Ofertas</a><br>

                    <!-- Botão Editar -->
                    <a href="{{ route('users.edit', $cliente->id) }}" class="btn btn-warning">Editar</a><br>

                    <!-- Botão Excluir -->
                    <form action="{{ route('users.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                        Excluir
                        </button>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Voltar</a>
</x-admin-layout>
