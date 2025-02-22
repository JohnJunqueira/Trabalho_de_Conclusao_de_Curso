
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Prestadores') }}
        </h2>
    </x-slot>

    <div class="row m-3">
        @if (!empty($prestadores) && count($prestadores) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Nome Completo</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Email</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Apelido Profissional</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Gênero</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Data de Nascimento</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Celular</th>
                    </tr>
                </thead>


                @foreach($prestadores as $prestador)
                    <tbody class="conteudo-itens">
                        <tr>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->name }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->email }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->apelidoprofissional }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->genero }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->datadenascimento }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $prestador->celular }}</td>

                            <td>
                                <!-- Botão Ver Serviços -->
                                <a href="{{ route('servicos.show', ['prestador_id' => $prestador->id, 'divisao_id' => $divisaoId]) }}" class="btn btn-warning">Ver Serviços</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <p class="text-center">Nenhum Prestador com serviço cadastrado nesta divisão foi encontrado.</p>
        @endif

    <br>
    <a href="{{ route('categorias.index') }}" class="btn btn-dark">Voltar</a>
</x-app-layout>
