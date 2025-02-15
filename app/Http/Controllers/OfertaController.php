<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Divisao;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class OfertaController extends Controller
{
    public function index()
    {
        // Obtém o usuário logado
        $user = Auth::user();

        // Verifica se o usuário é um prestador
        if ($user->role === 'cliente') {
            // Obtém apenas os serviços do prestador logado
            $ofertas = Oferta::where('usuario_id', $user->id)->get();
        } else {
            // Se for admin, mostra todos os serviços
            $ofertas = Oferta::all();
        }
            // Passa a variável $user para a view
            return view('ofertas.index', compact('ofertas', 'user'));
    }

    public function show($cliente_id, $divisao_id)
    {
        // Busca o cliente
        $cliente = User::findOrFail($cliente_id);

        // Busca a divisão
        $divisao = Divisao::findOrFail($divisao_id);

        // Filtra apenas as ofertas do cliente naquela divisão
        $ofertas = $cliente->ofertas()->where('divisao_id', $divisao_id)->get();

        // Retorna a view com os dados necessários
        return view('ofertas.show', compact('cliente', 'ofertas', 'divisao'));
    }


    public function create(Request $request)
    {
        $categoria = Categoria::findOrFail($request->categoria_id); // Obtém a categoria pelo ID passado na URL
        $divisao = Divisao::findOrFail($request->divisao_id); // Obtém a divisão com base no ID passado

        // $categoria->divisoes->categoria_id;

        $usuarios = User::all();
        return view('ofertas.create', ['categoria' => $categoria, 'divisao' => $divisao, 'usuarios' => $usuarios]);
    }


    //Método post enviando dados pela requisição-> Request $request;
    public function store(Request $request){
        $oferta = new Oferta();
        $oferta->titulodaoferta = $request->titulodaoferta;
        $oferta->descricaodaoferta = $request->descricaodaoferta;
        $oferta->urgencia = $request->urgencia;
        $oferta->valorestimado = $request->valorestimado;
        $oferta->datapublicacao = $request->datapublicacao;
        $oferta->datalimite = $request->datalimite;
        $oferta->status = $request->status;
        $oferta->localizacao =$request->localizacao;
        $oferta->contatodisponivel = $request->contatodisponivel;
        $oferta->outroscontatos = $request->outroscontatos;
        $oferta->frequencia = $request->frequencia;
        $oferta->preferenciacliente = $request->preferenciacliente;
        $oferta->usuario_id = $request->usuario_id;
        $oferta->categoria_id = $request->categoria_id;
        $oferta->divisao_id = $request->divisao_id;
        $oferta->save();

        return redirect()->route('ofertas.index');
    }

    public function edit($id)
    {
        $Oferta = Oferta::findorFail($id);
        $categorias = Categoria::all();
        $divisoes = Divisao::all();
        $usuarios = User::all();
        return view('ofertas.edit',['Oferta'=>$Oferta, 'categorias' => $categorias, 'divisoes' => $divisoes, 'usuarios' => $usuarios]);
    }

    public function update (Request $request)
    {
        Oferta::find($request->id)->update($request->except('_token'));
        return redirect()->route('ofertas.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy ($id)
    {
        try {
            Oferta::findorfail($id)->delete();
            return redirect()->route('ofertas.index')->with('msg', 'Oferta apagada com sucesso');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Esta oferta não pode ser excluída pois está sendo utilizada por um usuário ativo.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir a oferta.');
            }
        }
    }
}
