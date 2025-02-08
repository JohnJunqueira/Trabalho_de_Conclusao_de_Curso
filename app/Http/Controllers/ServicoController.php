<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\QueryException;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', ['servicos'=>$servicos]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('servicos.create', ['categorias' => $categorias, 'usuarios' => $usuarios]);
    }

    //Método post enviando dados pela requisição-> Request $request;
    public function store(Request $request){
        $servico = new Servico();
        $servico->titulodaespecialidade = $request->titulodaespecialidade;
        $servico->descricaodaatividade = $request->descricaodaatividade;
        $servico->tempoexperiencia = $request->tempoexperiencia;
        $servico->servicosfrequentes = $request->servicosfrequentes;
        $servico->valormedio = $request->valormedio;
        $servico->formadetrabalho = $request->formadetrabalho;
        $servico->formadepagamento = $request->formadepagamento;
        $servico->agendadisponivel =$request->agendadisponivel;
        $servico->contatodisponivel = $request->contatodisponivel;
        $servico->datacadastro = $request->datacadastro;
        $servico->regioesatendidas = $request->regioesatendidas;
        $servico->categoria_id = $request->categoria_id;
        $servico->usuario_id = $request->usuario_id;
        $servico->save();
        return redirect()->route('servicos.index');
    }

    public function edit($id)
    {
        $Servico = Servico::findorFail($id);
        $categorias = Categoria::all();
        $usuarios = User::all();
        return view('servicos.edit',['Servico'=>$Servico, 'categorias' => $categorias, 'usuarios' => $usuarios]);
    }

    public function update (Request $request)
    {
        Servico::find($request->id)->update($request->except('_token'));
        return redirect()->route('servicos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy ($id)
    {
        try {
            Servico::findorfail($id)->delete();
            return redirect()->route('servicos.index')->with('msg', 'Serviço apagado com sucesso');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Este serviço não pode ser excluído pois está sendo utilizado por um usuário ativo.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir o serviço.');
            }
        }
    }
}
