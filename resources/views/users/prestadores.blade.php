
<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Prestadores') }}
        </h2>
    </x-slot>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Nome Completo</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Email</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Apelido Profissional</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Gênero</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Data de Nascimento</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Celular</th>
                <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Ações para Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestadores as $prestador)
                <tr>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->name }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->email }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->apelidoprofissional }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->genero }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->datadenascimento }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->celular }}</td>
                    <td class="text-justify border border-gray-300 px-4 py-2">

                        <!-- Botão Ver Serviços -->
                        <a href="{{ route('servicos.index', $prestador->id) }}" class="btn btn-warning">Ver Serviços</a><br>

                        <!-- Botão Editar -->
                        <a href="{{ route('users.edit', $prestador->id) }}" class="btn btn-warning">Editar</a><br>

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
