
<x-admin-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><label for="name" class="fw-bold">Nome:</label></td>
                        <td><input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="email" class="fw-bold">Email:</label></td>
                        <td><input type="email" name="email" id="email"  class="form-control" value="{{ $user->email }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="apelidoprofissional" class="fw-bold">Apelido:</label></td>
                        <td><input type="text" name="apelidoprofissional" id="apelidoprofissional" class="form-control" value="{{ $user->apelidoprofissional }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="genero" class="fw-bold">Gênero:</label></td>
                        <td><select name="genero" id="genero" class="form-control" required>
                            <option value="masculino" {{ $user->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="feminino" {{ $user->genero == 'feminino' ? 'selected' : '' }}>Feminino</option>
                            <option value="prefiro não dizer" {{ $user->genero == 'prefiro não dizer' ? 'selected' : '' }}>Prefiro não dizer</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="datadenascimento" class="fw-bold">Data de Nascimento:</label></td>
                        <td><input type="date" name="datadenascimento" id="datadenascimento" class="form-control" value="{{ $user->datadenascimento }}" required></td>
                    </tr>
                    <tr>
                        <td><label for="celular" class="fw-bold">Celular:</label></td>
                        <td><input type="text" name="celular" id="celular" class="form-control" value="{{ $user->celular }}" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">
                            <br>
                            <button type="submit" class="btn btn-success me-4 border border-dark px-4 py-2">Atualizar</button>
                            <a href="{{ route('users.clientes') }}" class="btn btn-secondary border border-dark px-4 py-2">Cancelar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-admin-layout>
