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
        $categoria = new Categoria();//criou uma estância-> a classe $categoria estanciada
        $categoria->nomecategoria = $request->nomecategoria;//A classe categoria, o atributo nomecategoria recebe o que está vindo da requisição;
        $categoria->save();
        return redirect()->route('categorias.index');
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
