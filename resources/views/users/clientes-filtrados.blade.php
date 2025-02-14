
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
                        <th>Nome Completo</th>
                        <th>Email</th>
                        <th>Apelido Profissional</th>
                        <th>Gênero</th>
                        <th>Data de Nascimento</th>
                        <th>Celular</th>
                    </tr>
                </thead>


                @foreach($clientes as $cliente)
                    <tbody class="conteudo-itens">
                        <tr>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->apelidoprofissional }}</td>
                            <td>{{ $cliente->genero }}</td>
                            <td>{{ $cliente->datadenascimento }}</td>
                            <td>{{ $cliente->celular }}</td>

                            <td>
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
