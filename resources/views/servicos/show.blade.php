@extends('layouts.main')

@section('title', 'Serviços')

@section('cabecalho')

<div class="d-flex cabecalho2">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse flex-row-reverse" id="menuNavbar">
        <ul class="navbar-nav me-auto ">
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('dashboard') }}">
                Início
                <svg class="bi bi-house m-0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg>
            </a>
        </ul>
    </div>

</div>
@endsection('cabecalho')

@section('content')

<!-- <div>
    <nav class="navbar">
        <div class="col ms-2 ">
            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#menuLateral">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> -->

<style>
    i {
        font-size: 1.5em;
    }
</style>

<!--Conteúdo-->
<div class="container-fluid">
    <a href="" id="categorias" class="ms-5 text-start badge text-wrap sinalizador">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        </svg>
    </a>


    <h1 class="text-center">Serviços</h1><br>

    <div class="ms-5 me-5 mt-1 mb-1 container-conteudo bg-light p-4">
        <div class="row">
            <div class="w-auto d-flex justify-content-center">
            </div>
        </div>

        <div class="row m-3">
            <table class="table cabecalho-itens text-center p-2" id="conteudo-itens-lado-direito">
                <thead>
                    <tr>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Especialidade</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Descrição da Atividade</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Tempo de Experiência</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Serviços Frequentes</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Valor Médio</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Forma de Trabalho</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Forma de Pagamento</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Agenda Disponível</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Contato Principal</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Outras Formas de Contato</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Data do Cadastro</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Regiões Atendidas</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Categoria</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Divisão da Categoria</th>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Prestador</th>
                    </tr>
                </thead>

                @foreach ($servicos as $servico)
                <tbody class="conteudo-itens">
                    <tr>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->titulodaespecialidade}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->descricaodaatividade}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->tempoexperiencia}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->servicosfrequentes}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->valormedio}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->formadetrabalho}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->formadepagamento}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->agendadisponivel}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->contatodisponivel}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->outroscontatos}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($servico->datacadastro)->format('d/m/Y H:i') }}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->regioesatendidas}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->acessarCategoria->nomecategoria}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$servico->acessarDivisao->nomedivisoes}}</td>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{ optional($servico->acessarUsuario)->name ?? 'Usuário não definido' }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>


        <div class="col-lg-12 me-3 d-flex justify-content-end me-3" style="text-align:right">
            <a href="{{ route ('prestador.dashboard') }}" class="btn btn-secondary me-5 mb-5" style="color: #fff;">Voltar</a>
        </div>


    </div>

</div>

<!-- Modal -->
<div class="modal fade modalExcluir" id="excluirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-center">
        <div class="modal-content">
            <div class="modal-header"><!--Modal-header-->
                <h5 class="modal-title" id="exampleModalLabel">Excluir item</h5>
            </div>
            <div class="modal-body"><!--Modal-body-->
                Tem certeza que deseja excluir esse Serviço?
            </div>
            <div class="modal-footer row"><!--Modal-footer-->
                <div class="col d-flex justify-content-around">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <div class="col d-flex justify-content-around">
                    <button type="button" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmarExclusao() {
        if (confirm("Tem certeza que deseja excluir esse Serviço?")) {
            document.getElementById('formExcluir').submit();
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection('content')
