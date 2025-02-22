@extends('layouts.main')

@section('title', 'Categorias')

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


    <h1 class="text-center">Categorias</h1><br>


        <div class="row">
            <div class="w-auto d-flex justify-content-center">
            </div>
        </div>

        <div class="row m-3">
            <table class="table cabecalho-itens text-center p-2" id="conteudo-itens-lado-direito">
                <thead>
                    <tr>
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 400px;">Categorias</th>
                        @if (Auth::user()->role === 'admin')
                            <th class="text-start border border-gray-300 px-4 py-2" style="width: 100px;">Acesso Exclusivo do Admin</th>
                        @endif
                        <th class="text-start border border-gray-300 px-4 py-2" style="width: 100px;">Opções para Categorias</th>
                    </tr>
                </thead>

                @foreach ($categorias as $categoria)
                <tbody class="conteudo-itens">
                    <tr>
                        <td class="text-justify border border-gray-300 px-4 py-2">{{$categoria->nomecategoria}}</td>

                        @php
                            $role = Auth::user()->role ?? 'cliente'; // Garante que sempre tenha um valor
                        @endphp

                        @if (Auth::user()->role === 'admin')
                            <td class="text-justify border border-gray-300 px-4 py-2">
                                <div class="d-flex text-start">
                                    <!-- Botão para Ver Divisões -->
                                    <a href="{{ route('divisoes.show', ['categoria_id' => $categoria->id]) }}" class="btn btn-info me-2">
                                        Ver Divisões
                                    </a>

                                    <!-- Botão para Adicionar Divisão -->
                                    <a href="{{ route('divisoes.create', ['categoria_id' => $categoria->id]) }}" class="btn btn-success me-2">
                                        + Divisão
                                    </a>
                                </div>
                            </td>
                        @endif


                        @if($role === 'cliente')
                            <td>
                                <div class="d-flex justify-content-center">
                                    <!-- Botão para Acessar Divisão por Categoria -->
                                    <a href="{{ route('divisoes.show', ['categoria_id' => $categoria->id]) }}" class="btn btn-info me-2">
                                    Buscar Prestadores
                                    </a>

                                    <!-- Botão para Acessar Divisão por Categoria -->
                                    <a href="{{ route('divisoes.show', ['categoria_id' => $categoria->id]) }}" class="btn btn-success me-2">
                                    Criar Oferta
                                    </a>
                                </div>
                            </td>
                        @endif

                        @if($role === 'prestador')
                            <td>
                                <div class="d-flex justify-content-center">
                                    <!-- Botão para Ver prestadores -->
                                    <a href="{{ route('divisoes.show', ['categoria_id' => $categoria->id]) }}" class="btn btn-info me-2">
                                    Pesquisar Clientes
                                    </a>

                                    <!-- Botão para Acessar Divisão por categoria -->
                                    <a href="{{ route('divisoes.show', ['categoria_id' => $categoria->id]) }}" class="btn btn-success me-2">
                                    Cadastrar Serviço
                                    </a>
                                </div>
                            </td>
                        @endif

                        @if($role === 'admin')
                            <td class="text-justify border border-gray-300 px-4 py-2">
                                <div class="d-flex gap-1">
                                    <form action="{{route('categorias.edit', ['id' => $categoria->id])}}" method="get">
                                        @csrf
                                        <input type="submit" class="btn btn-primary btn-sm" name="formulario" value="Editar">
                                    </form>

                                    <form id="formExcluir" action="{{ route('categorias.delete', ['id' => $categoria->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Excluir" onclick="return confirmarExclusao();">
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>


        <div class="col-lg-12 me-3 d-flex justify-content-end me-3" style="text-align:right">
            @php
                $role = Auth::user()->role ?? 'cliente'; // Garante que o valor exista

                // Definir a rota com base no tipo de usuário
                if ($role === 'admin') {
                    $route = route('admin.dashboard');
                } elseif ($role === 'prestador') {
                    $route = route('prestador.dashboard');
                 } else {
                    $route = route('dashboard'); // Cliente
                }
            @endphp

            <a href="{{ $route }}" class="btn btn-secondary me-5 mb-5" style="color: #fff;">Retornar</a>

            @if($role === 'admin')
                <form action="{{route('categorias.create')}}" method="get">

                    <input type="submit" class="btn btn-success" value="+ Nova Categoria">
                </form>
            @endif
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
                Tem certeza que deseja excluir essa categoria?
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
        if (confirm("Tem certeza que deseja excluir essa categoria?")) {
            document.getElementById('formExcluir').submit();
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection('content')
