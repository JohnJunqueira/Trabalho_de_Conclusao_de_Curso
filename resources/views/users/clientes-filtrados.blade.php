
<x-prestador-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Clientes') }}
        </h2>
    </x-slot>

    <div class="row m-3">
        @if (!empty($clientes) && count($clientes) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Nome Completo</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Email</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Apelido</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Gênero</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Data de Nascimento</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Celular</th>
                    </tr>
                </thead>


                @foreach($clientes as $cliente)
                    <tbody class="conteudo-itens">
                        <tr>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->name }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->email }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->apelidoprofissional }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->genero }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->datadenascimento }}</td>
                            <td class="text-justify border border-gray-300 px-4 py-2">{{ $cliente->celular }}</td>

                            <td class="text-justify border border-gray-300 px-4 py-2">
                                <!-- Botão Ver Ofertas -->
                                <a href="{{ route('ofertas.show', ['cliente_id' => $cliente->id, 'divisao_id' => $divisaoId]) }}" class="btn btn-warning">Ver ofertas</a>

                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <p class="text-center">Nenhum Cliente com oferta cadastrada nesta divisão foi encontrado.</p>
        @endif

    <br>
    <a href="{{ route('categorias.index') }}" class="btn btn-dark">Voltar</a>
</x-prestador-layout>
