<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Database\QueryException;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('subcategorias.index', ['subcategorias'=>$subcategorias]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategorias.create', ['categorias' => $categorias]);
    }

    //Método post enviando dados pela requisição-> Request $request;
    public function store(Request $request){
        $subcategoria = new Subcategoria();
        $subcategoria->nomesubcategoria = $request->nomesubcategoria;
        $subcategoria->categoria_id = $request->categoria_id;
        $subcategoria->save();
        return redirect()->route('subcategorias.index');
    }

    public function edit($id)
    {
        $Subcategoria = Subcategoria::findorFail($id);
        $categorias = Categoria::all();
        return view('subcategorias.edit',['Subcategoria'=>$Subcategoria, 'categorias' => $categorias]);
    }

    public function update (Request $request)
    {
        Subcategoria::find($request->id)->update($request->except('_token'));
        return redirect()->route('subcategorias.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy ($id)
    {
        try {
            Subcategoria::findorfail($id)->delete();
            return redirect()->route('subcategorias.index')->with('msg', 'SubCategoria apagada com sucesso');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Esta subcategoria não pode ser excluída pois está sendo utilizada em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir a subcategoria.');
            }
        }
    }
}
