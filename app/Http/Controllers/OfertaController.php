<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\QueryException;


class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::all();
        return view('ofertas.index', ['ofertas'=>$ofertas]);
    }

    public function create(Request $request)
    {
        $categoria = Categoria::findOrFail($request->categoria_id); // Obtém a categoria pelo ID passado na URL
        $usuarios = User::all();
        return view('ofertas.create', ['categoria' => $categoria, 'usuarios' => $usuarios]);
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
        $oferta->frequencia = $request->frequencia;
        $oferta->disponibilidadecliente = $request->disponibilidadecliente;
        $oferta->usuario_id = $request->usuario_id;
        $oferta->categoria_id = $request->categoria_id;
        $oferta->save();

        return redirect()->route('ofertas.index');
    }

    public function edit($id)
    {
        $Oferta = Oferta::findorFail($id);
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('ofertas.edit',['Oferta'=>$Oferta, 'categorias' => $categorias, 'usuarios' => $usuarios]);
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
