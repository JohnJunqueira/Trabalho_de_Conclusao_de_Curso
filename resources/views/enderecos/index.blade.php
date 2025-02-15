@extends('layouts.app')



@section('content')

<!--Conteúdo-->
<div class="container-fluid">
    <a href="" id="categorias" class="ms-5 text-start badge text-wrap sinalizador">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
        </svg>
    </a>

    <h1 class="text-center">Endereços</h1><br>
        <div class="row m-3">
           <!-- <table class="table cabecalho-itens text-center p-2" id="conteudo-itens-lado-direito">-->
            <table class="table w-auto cabecalho-itens p-2">

                <thead>
                    <tr>
                        <th class="text-start">CEP</th>
                        <th class="text-start">Nome da Rua</th>
                        <th class="text-start">Número</th>
                        <th class="text-start">Bairro</th>
                        <th class="text-start">Complemento</th>
                        <th class="text-start">Cidade</th>
                        <th class="text-start">Estado</th>
                        <th class="text-start">Ponto de Referência</th>
                        <th class="text-start">Usuário</th>
                    </tr>
                </thead>

                @foreach ($enderecos as $endereco)
                <tbody class="conteudo-itens">
                    <tr>
                        <td class="text-justify">{{$endereco->cep}}</td>
                        <td class="text-justify">{{$endereco->nomedarua}}</td>
                        <td class="text-justify">{{$endereco->numero}}</td>
                        <td class="text-justify">{{$endereco->bairro}}</td>
                        <td class="text-justify">{{$endereco->complemento}}</td>
                        <td class="text-justify">{{$endereco->cidade}}</td>
                        <td class="text-justify">{{$endereco->estado}}</td>
                        <td class="text-justify">{{$endereco->pontodereferencia }}</td>
                        <td class="text-justify">{{$endereco->acessarUsuario->name}}</td>

                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{route('enderecos.edit', ['id' => $endereco->id])}}" method="get">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" name="formulario" value="Alterar">
                                </form>

                                <form id="formExcluir" action="{{ route('enderecos.delete', ['id' => $endereco->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-primary" value="Deletar" onclick="return confirmarExclusao();"><br><br>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>

                @endforeach
            </table>
        </div>


        <div class="col-lg-12 me-3 d-flex justify-content-end me-3" style="text-align:right">
            <form action="{{route('enderecos.create')}}" method="get">
                @csrf
                <input type="submit" class="btn btn-success" value="Nova">
            </form>
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
                    Tem certeza que deseja excluir esse Endereço?
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
        if (confirm("Tem certeza que deseja excluir esse Endereço?")) {
            document.getElementById('formExcluir').submit();
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection('content')
