<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome Completo*')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Apelido Profissional -->
        <div class="mt-4">
            <x-input-label for="apelidoprofissional" :value="__('Apelido Profissional*')" />
            <x-text-input id="apelidoprofissional" class="block mt-1 w-full" type="text" name="apelidoprofissional" :value="old('apelidoprofissional')" required autofocus autocomplete="apelidoprofissional" />
            <x-input-error :messages="$errors->get('apelidoprofissional')" class="mt-2" />
        </div>

        <!-- Gênero -->
        <div class="mt-4">
            <x-input-label for="genero" :value="__('Gênero*')" />
            <select id="genero" name="genero" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" disabled selected>Selecione</option>
                <option value="masculino">Masculino</option>
                <option value="feminino">Feminino</option>
                <option value="prefironaodizer">Prefiro não dizer</option>
            </select>
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
        </div>

        <!-- Data de Nascimento -->
        <div class="mt-4">
            <x-input-label for="datadenascimento" :value="__('Data de Nascimento*')" />
            <x-text-input id="datadenascimento" class="block mt-1 w-full" type="date" name="datadenascimento" :value="old('datadenascimento')" required autofocus autocomplete="datadenascimento" />
            <x-input-error :messages="$errors->get('datadenascimento')" class="mt-2" />
        </div>

        <!-- Celular -->
        <div class="mt-4">
            <x-input-label for="celular" :value="__('Celular*')" />
            <x-text-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required autofocus autocomplete="celular" />
            <x-input-error :messages="$errors->get('celular')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail*')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Como deseja se Cadastar*')" />
            <select id="role" name="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" disabled selected>Escolha uma Opção</option>
                <option value="cliente" {{ old('role') == 'usercliente' ? 'selected' : '' }}>Cliente</option>
                <option value="prestador" {{ old('role') == 'prestador' ? 'selected' : '' }}>Prestador(a)</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha*')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha*')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já está cadastrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Cadastre-se') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
