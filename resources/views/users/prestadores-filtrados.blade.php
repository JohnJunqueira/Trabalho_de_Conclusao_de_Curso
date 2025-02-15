
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
                        <th>Nome Completo</th>
                        <th>Email</th>
                        <th>Apelido Profissional</th>
                        <th>Gênero</th>
                        <th>Data de Nascimento</th>
                        <th>Celular</th>
                    </tr>
                </thead>


                @foreach($prestadores as $prestador)
                    <tbody class="conteudo-itens">
                        <tr>
                            <td>{{ $prestador->name }}</td>
                            <td>{{ $prestador->email }}</td>
                            <td>{{ $prestador->apelidoprofissional }}</td>
                            <td>{{ $prestador->genero }}</td>
                            <td>{{ $prestador->datadenascimento }}</td>
                            <td>{{ $prestador->celular }}</td>

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
