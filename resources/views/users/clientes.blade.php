
<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <ul>
        @foreach($clientes as $cliente)
            <li>
                {{ $cliente->name }} - {{ $cliente->email }}

                <!-- Botão Editar -->
                <a href="{{ route('users.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>

                <!-- Botão Excluir -->
                <form action="{{ route('users.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                        Excluir
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Voltar</a>
</x-admin-layout>
