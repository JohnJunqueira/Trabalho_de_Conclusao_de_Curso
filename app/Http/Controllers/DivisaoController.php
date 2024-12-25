<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisao;
use App\Models\Subcategoria;
use Illuminate\Database\QueryException;

class DivisaoController extends Controller
{
    public function index()
    {
        $divisoes = Divisao::all();
        return view('divisoes.index', ['divisoes'=>$divisoes]);
    }

    public function create()
    {
        $subcategorias = Subcategoria::all();
        return view('divisoes.create', ['subcategorias' => $subcategorias]);
    }

    //Método post enviando dados pela requisição-> Request $request;
    public function store(Request $request){
        $divisoes = new Divisao();
        $divisoes->nomedivisoes = $request->nomedivisoes;
        $divisoes->subcategoria_id = $request->subcategoria_id;
        $divisoes->save();
        return redirect()->route('divisoes.index');
    }

    public function edit($id)
    {
        $Divisao = Divisao::findorFail($id);
        $subcategorias = Subcategoria::all();
        return view('divisoes.edit',['Divisao'=>$Divisao, 'subcategorias' => $subcategorias]);
    }

    public function update (Request $request)
    {
        Divisao::find($request->id)->update($request->except('_token'));
        return redirect()->route('divisoes.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy ($id)
    {
        try {
            Divisao::findorfail($id)->delete();
            return redirect()->route('divisoes.index')->with('msg', 'Divisão apagada com sucesso');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Esta divisão não pode ser excluída pois está sendo utilizada em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir a divisão.');
            }
        }
    }
}
