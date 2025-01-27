@extends('layouts.main')

@section('title', 'Cadastrar Endereços')

@section('cabecalho')

<div class="d-flex cabecalho2">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse flex-row-reverse" id="menuNavbar">
        <ul class="navbar-nav me-auto ">
            <a class="nav-item nav-link active align-itens-center m-2" href="{{ route('dashboard')}}">
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
    <div class="ms-5 text-start badge text-wrap sinalizador">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
            <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z" />
        </svg>
    </div>

    <h1>Cadastrar Endereço</h1><br>

    <div class="ms-5 me-5 mt-1 mb-1 container-conteudo bg-light p-4">
        <div class="row d-flex justify-content-around ">
            <form action="{{ route('enderecos.store') }}" method="POST" class="col-12 m-0 p-0 formulario">
                @csrf

                <div class="row m-2">
                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="cep" class="m-2 textoAzul3">CEP</label>
                        <input type="text" id="cep" class="w-auto form-control w-sm-auto" placeholder="" name="cep" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="nomedarua" class="m-2 textoAzul3">Rua</label>
                        <input type="text" id="nomedarua" class="w-auto form-control w-sm-auto" placeholder="" name="nomedarua" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="numero" class="m-2 textoAzul3">Número</label>
                        <input type="number" id="numero" class="w-auto form-control w-sm-auto" placeholder="" name="numero" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="bairro" class="m-2 textoAzul3">Bairro</label>
                        <input type="text" id="bairro" class="w-auto form-control w-sm-auto" placeholder="" name="bairro" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="complemento" class="m-2 textoAzul3">Complemento</label>
                        <input type="text" id="complemento" class="w-auto form-control w-sm-auto" placeholder="" name="complemento" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="cidade" class="m-2 textoAzul3">Cidade</label>
                        <input type="text" id="cidade" class="w-auto form-control w-sm-auto" placeholder="" name="cidade" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="estado" class="m-2 textoAzul3">Estado</label>
                        <input type="text" id="estado" class="w-auto form-control w-sm-auto" placeholder="" name="estado" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="pontodereferencia" class="m-2 textoAzul3">Ponto de Referência</label>
                        <input type="text" id="pontodereferencia" class="w-auto form-control w-sm-auto" placeholder="" name="pontodereferencia" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="usuario_id" class="m-2 textoAzul3">Usuário</label>
                        <select name="usuario_id" id="usuario_id" class="w-auto form-control w-sm-auto" required>
                            @if ($usuarios->isEmpty())
                            <option value="" disabled>Nenhum usuário cadastrado</option>
                            @else
                            <option value="" disabled selected>Selecione o Usuário</option>
                            @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>



                <div class="col-lg-12" style="text-align:right">
                    <button type="submit" class="btn btn-success me-5 mb-5" style="color: #fff;">
                        Cadastrar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection('content')
