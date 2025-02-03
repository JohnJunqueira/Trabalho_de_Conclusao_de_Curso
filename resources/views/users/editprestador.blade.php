

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Prestador') }}
        </h2>
    </x-slot>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>

        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>


    <a href="{{ route('users.clientes') }}" class="btn btn-secondary">Cancelar</a>
</x-app-layout>
