@extends('layouts.main')

@section('title', 'Editar Ofertas')

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

<div class="container-fluid">
    <div class="ms-5 text-start badge text-wrap sinalizador">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
            <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z" />
        </svg>
    </div>

    <h1 class="text-center">Edite sua Oferta de Serviço</h1><br>

    <div class="ms-5 me-5 mt-1 mb-1 container-conteudo bg-light p-4">
        <div class="row d-flex justify-content-around ">
            <form action="{{ route('ofertas.update', $Oferta->id) }}" method="POST" class="col-12 m-0 p-0 formulario">
                @csrf

                <div class="row m-2">
                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="titulodaoferta" class="m-2 textoAzul3">Oferta</label>
                        <input value="{{$Oferta->titulodaoferta}}" type="text" id="titulodaoferta" class="w-auto form-control w-sm-auto" name="titulodaoferta" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="descricaodaoferta" class="m-2 textoAzul3">Descrição da Oferta</label>
                        <input value="{{$Oferta->descricaodaoferta}}" type="text" id="descricaodaoferta" class="w-auto form-control w-sm-auto" name="descricaodaoferta" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="urgencia" class="m-2 textoAzul3">Urgência em realizar o serviço</label>
                        <select id="urgencia" class="w-auto form-control w-sm-auto" name="urgencia" required>
                            <option value="Alta" {{ $Oferta->urgencia == 'Alta' ? 'selected' : '' }}>Alta</option>
                            <option value="Média" {{ $Oferta->urgencia == 'Média' ? 'selected' : '' }}>Média</option>
                            <option value="Baixa" {{ $Oferta->urgencia == 'Baixa' ? 'selected' : '' }}>Baixa</option>
                        </select>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="valorestimado" class="m-2 textoAzul3">Valor Estimado</label>
                        <input value="{{$Oferta->valorestimado}}" type="text" id="valorestimado" class="w-auto form-control w-sm-auto" name="valorestimado" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="datapublicacao" class="m-2 textoAzul3">Data da Publicação</label>
                        <input value="{{$Oferta->datapublicacao}}" type="datetime-local" id="datapublicacao" class="w-auto form-control w-sm-auto" name="datapublicacao" required readonly>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="datalimite" class="m-2 textoAzul3">Data Limite</label>
                        <input value="{{ \Carbon\Carbon::parse($Oferta->datalimite)->format('Y-m-d') }}" type="date" id="datalimite" class="w-auto form-control w-sm-auto" name="datalimite" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="status" class="m-2 textoAzul3">Status</label>
                        <select id="status" class="w-auto form-control w-sm-auto" name="status" required>
                            <option value="Aberta" {{ $Oferta->status == 'Aberta' ? 'selected' : '' }}>Aberta</option>
                            <option value="Em andamento" {{ $Oferta->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                            <option value="Concluída" {{ $Oferta->status == 'Concluída' ? 'selected' : '' }}>Concluída</option>
                        </select>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="localizacao" class="m-2 textoAzul3">Local do serviço (Endereço)</label>
                        <input value="{{$Oferta->localizacao}}" type="text" id="localizacao" class="w-auto form-control w-sm-auto" name="localizacao" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="contatodisponivel" class="m-2 textoAzul3">Contato Principal</label>
                        <input value="{{$Oferta->contatodisponivel}}" type="text" id="contatodisponivel" class="w-auto form-control w-sm-auto" name="contatodisponivel" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="outroscontatos" class="m-2 textoAzul3">Outras Formas de Contato</label>
                        <input value="{{$Oferta->outroscontatos}}" type="text" id="outroscontatos" class="w-auto form-control w-sm-auto" name="outroscontatos" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="frequencia" class="m-2 textoAzul3">Frequência</label>
                        <select id="frequencia" class="w-auto form-control w-sm-auto" name="frequencia" required>
                            <option value="Única" {{ $Oferta->frequencia == 'Única' ? 'selected' : '' }}>Única</option>
                            <option value="Semanal" {{ $Oferta->frequencia == 'Semanal' ? 'selected' : '' }}>Semanal</option>
                            <option value="Mensal" {{ $Oferta->frequencia == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                        </select>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="preferenciacliente" class="m-2 textoAzul3">Dias e horários de preferência</label>
                        <input value="{{$Oferta->preferenciacliente}}" type="text" id="preferenciacliente" class="w-auto form-control w-sm-auto" name="preferenciacliente" required>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="categoria_id" class="m-2 textoAzul3">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="w-auto form-control w-sm-auto" required>
                            <option value="" disabled>Selecione a categoria</option>
                            @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $Oferta->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nomecategoria}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="divisao_id" class="m-2 textoAzul3">Divisão da Categoria</label>
                        <select name="divisao_id" id="divisao_id" class="w-auto form-control w-sm-auto" required>
                            <option value="" disabled>Selecione a divisão da categoria</option>
                            @foreach($divisoes as $divisao)
                            <option value="{{ $divisao->id }}" {{ $Oferta->divisao_id == $divisao->id ? 'selected' : '' }}>
                                {{ $divisao->nomedivisoes}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-lg-3 col-md-4 col-sm-auto m-lg-4 m-md-4 m-sm-0">
                        <label for="usuario_id" class="m-2 textoAzul3">Usuário</label>
                        <select id="usuario_id" class="w-auto form-control w-sm-auto" disabled>
                            <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                        </select>
                        <input type="hidden" name="usuario_id" value="{{ auth()->user()->id }}">
                    </div>
                </div>
            </div>

                <div class="col-lg-12" style="text-align:right">
                    <a href="{{ route ('ofertas.index') }}" class="btn btn-secondary me-5 mb-5" style="color: #fff;">Voltar</a>
                    <button type="submit" class="btn btn-success me-5 mb-5" style="color: #fff;">
                        Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection('content')
