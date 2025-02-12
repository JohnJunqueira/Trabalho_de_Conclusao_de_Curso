<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisao;
use App\Models\Categoria;
use Illuminate\Database\QueryException;

class DivisaoController extends Controller
{
    public function index()
    {
        $divisoes = Divisao::all();
        //return view('divisoes.index', ['divisoes'=>$divisoes]);

        // Retornar a view com as divisões dessa categoria
        return view('divisoes.index', compact('divisoes'));
    }

    public function show($categoria_id){
        // Buscar a categoria pelo ID
        $categoria = Categoria::findOrFail($categoria_id);

        $divisoes = $categoria->divisoes ?? []; // Supondo que a relação esteja definida no model e se a relação não for carregada corretamente, garantir que $divisoes seja um array vazio

        return view('divisoes.show', compact('divisoes'));
    }

    public function create(Request $request)
    {
        $categoria = Categoria::findOrFail($request->categoria_id); // Obtém a categoria pelo ID passado na URL
        $divisoes = Divisao::all();
        return view('divisoes.create', ['categoria' => $categoria, 'divisoes' => $divisoes]);

        // Verifica se a categoria existe
        if (!$categoria) {
            return redirect()->route('categorias.create')->with('error', 'Você precisa criar uma categoria primeiro.');
        }
        return view('divisoes.create', compact('categoria'));
    }

    //Método post enviando dados pela requisição-> Request $request;
    public function store(Request $request){
        $divisoes = new Divisao();
        $divisoes->nomedivisoes = $request->nomedivisoes;
        $divisoes->categoria_id = $request->categoria_id;
        $divisoes->save();
        return redirect()->route('categorias.index');
    }

    public function edit($id)
    {
        $Divisao = Divisao::findorFail($id);
        $categorias = Categoria::all();
        return view('divisoes.edit',['Divisao'=>$Divisao, 'categorias' => $categorias]);
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
