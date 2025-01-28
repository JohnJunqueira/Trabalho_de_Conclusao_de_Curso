<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Atualize as informações de perfil e endereço de e-mail da sua conta.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nome Completo')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="apelidoprofissional" :value="__('Apelido Profissional')" />
            <x-text-input id="apelidoprofissional" name="apelidoprofissional" type="text" class="mt-1 block w-full" :value="old('apelidoprofissional', $user->apelidoprofissional)" required autofocus autocomplete="apelidoprofissional" />
            <x-input-error class="mt-2" :messages="$errors->get('apelidoprofissional')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Seu endereço de e-mail não foi verificado.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="genero" :value="__('Gênero')" />
            <select id="genero" name="genero" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" disabled {{ old('genero', $user->genero ?? '') == '' ? 'selected' : '' }}>Selecione</option>
                <option value="masculino" {{ old('genero', $user->genero ?? '') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="feminino" {{ old('genero', $user->genero ?? '') == 'feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="prefironaodizer" {{ old('genero', $user->genero ?? '') == 'prefironaodizer' ? 'selected' : '' }}>Prefiro não dizer</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('genero')" />
        </div>

        <div>
            <x-input-label for="datadenascimento" :value="__('Data de Nascimento')" />
            <x-text-input id="datadenascimento" name="datadenascimento" type="date" class="mt-1 block w-full" :value="old('datadenascimento', $user->datadenascimento)" required autofocus autocomplete="datadenascimento" />
            <x-input-error class="mt-2" :messages="$errors->get('datadenascimento')" />
        </div>

        <div>
            <x-input-label for="celular" :value="__('Celular')" />
            <x-text-input id="celular" name="celular" type="text" class="mt-1 block w-full" :value="old('celular', $user->celular)" required autofocus autocomplete="celular" />
            <x-input-error class="mt-2" :messages="$errors->get('celular')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>
