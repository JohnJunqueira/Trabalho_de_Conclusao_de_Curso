<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\User;

use Illuminate\Database\QueryException;


class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::all();
        return view('enderecos.index', ['enderecos'=>$enderecos]);
    }

    public function create()
    {
        $usuarios = User::all();
        return view('enderecos.create', ['usuarios' => $usuarios]);
    }

    //Método post enviando dados pela requisição-> Request $request;
    public function store(Request $request){
        $endereco = new Endereco();
        $endereco->cep = $request->cep;
        $endereco->nomedarua = $request->nomedarua;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->complemento = $request->complemento;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;
        $endereco->pontodereferencia = $request->pontodereferencia;
        $endereco->usuario_id = $request->usuario_id;
        $endereco->save();
        return redirect()->route('enderecos.index');
    }

    public function edit($id)
    {
        $Endereco = Endereco::findorFail($id);
        $usuarios = User::all();
        return view('enderecos.edit', ['Endereco'=> $Endereco, 'usuarios' => $usuarios]);
    }

    public function update (Request $request)
    {
        Endereco::find($request->id)->update($request->except('_token'));
        return redirect()->route('enderecos.index')->with('msg', 'Alteração realizada com sucesso');
    }

    public function destroy ($id)
    {
        try {
            Endereco::findorfail($id)->delete();
            return redirect()->route('enderecos.index')->with('msg', 'Endereço apagado com sucesso');
        } catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1451) {
                return redirect()->back()->with('error', 'Este endereço não pode ser excluído pois está sendo utilizado em outros lugares.');
            } else {
                return redirect()->back()->with('error', 'Erro ao excluir o endereço.');
            }
        }
    }
}
