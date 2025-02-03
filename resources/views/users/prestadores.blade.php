
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Prestadores') }}
        </h2>
    </x-slot>

    <ul>
        @foreach($prestadores as $prestador)
            <li>
                {{ $prestador->name }} - {{ $prestador->email }}

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
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">Voltar</a>
</x-app-layout>
