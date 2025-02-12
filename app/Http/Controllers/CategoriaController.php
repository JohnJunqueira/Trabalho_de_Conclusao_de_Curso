<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Database\QueryException;


class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', ['categorias'=>$categorias]);
    }

    public function create(){
        return view('categorias.create');
    }

    //Método post enviando dados pela requisição-> Request $request;
    public function store(Request $request){

        $categoria = new Categoria();
        $categoria->nomecategoria = $request->nomecategoria;
        //$categoria->save();

        // Criar a categoria no banco de dados
        $categoria = Categoria::create([
        'nomecategoria' => $request->nomecategoria
        ]);

        // Verifica se o usuário clicou em "Adicionar Divisão"
        if ($request->action == 'divisao') {
            // dd($categoria->id); // Para realizar teste de funcionamento
            // Redirecionar para a página de criar divisão da nova categoria
            return redirect()->route('divisoes.create', ['categoria_id' => $categoria->id]);
        }

        // Caso contrário, apenas redireciona para a lista de categorias, ou seja, se a ação for apenas cadastrar a categoria, redirecionar para a lista de categorias
        return redirect()->route('categorias.index')->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $Categoria = Categoria::findorFail($id);
        return view('categorias.edit',['Categoria'=>$Categoria]);
    }

    public function update (Request $request)
    {
        Categoria::find($request->id)->update($request->except('_token'));
        return redirect()->route('categorias.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy ($id)
    {
        try {
            Categoria::findorfail($id)->delete();
            return redirect()->route('categorias.index')->with('msg', 'Categoria apagada com sucesso');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Esta categoria não pode ser excluída pois está sendo utilizada em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir a categoria.');
            }
        }
    }
}
