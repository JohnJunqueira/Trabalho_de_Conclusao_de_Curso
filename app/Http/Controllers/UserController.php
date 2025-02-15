<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Prestador;
use App\Models\User;
use App\Models\Divisao;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listarPrestadores()
    {
        // Obtendo todos os Prestadores
        $prestadores = User::where('role', 'prestador')->get();
        return view('users.prestadores', compact('prestadores'));

    }

    public function listarPrestadoresFiltrados($categoriaId  = null, $divisaoId = null)
    {
        // Buscar a divisão para evitar erro de variável indefinida
        $divisao = Divisao::find($divisaoId);
        
        // Se não houver categoria e divisão, retorna todos os prestadores (para admin)
        if (is_null($categoriaId) || is_null($divisaoId)) {
            $prestadores = User::where('role', 'prestador')->get();
        } else {
        // Buscar apenas prestadores que cadastraram serviços na categoria e divisão selecionadas
        $prestadores = User::where('role', 'prestador')
            ->whereHas('servicos', function ($query) use ($categoriaId, $divisaoId) {
                $query->where('categoria_id', $categoriaId)
                    ->where('divisao_id', $divisaoId);
            })->get();
        }

        return view('users.prestadores-filtrados', compact('prestadores', 'categoriaId', 'divisaoId'));
    }


    public function listarClientes()
    {
        $clientes = User::where('role', 'cliente')->get();
        return view('users.clientes', compact('clientes'));
    }

    public function listarClientesFiltrados($categoriaId  = null, $divisaoId = null)
    {
        // Buscar a divisão para evitar erro de variável indefinida
        $divisao = Divisao::find($divisaoId);

        // Se não houver categoria e divisão, retorna todos os clientes (para admin)
        if (is_null($categoriaId) || is_null($divisaoId)) {
            $clientes = User::where('role', 'cliente')->get();
        } else {
        // Buscar apenas clientes que cadastraram ofertas de serviços na categoria e divisão selecionadas
        $clientes = User::where('role', 'cliente')
            ->whereHas('ofertas', function ($query) use ($categoriaId, $divisaoId) {
                $query->where('categoria_id', $categoriaId)
                    ->where('divisao_id', $divisaoId);
            })->get();
        }

        return view('users.clientes-filtrados', compact('clientes', 'categoriaId', 'divisaoId'));
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'cliente') {
            return view('users.editcliente', compact('user'));
        } elseif ($user->role === 'prestador') {
            return view('users.editprestador', compact('user'));
        } else {
            return redirect()->route('users.index')->with('error', 'Tipo de usuário inválido.');
        }
    }

    // Atualizar dados do Cliente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Verifica se o usuário é Cliente ou Prestador
        $isPrestador = $user->role === 'prestador';

        // Validação dos dados
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$id,
        ]);

        // Atualiza os dados
        $user->update($request->all());

        // Redireciona para a lista correta
        if ($isPrestador) {
            return redirect()->route('users.prestadores')->with('success', 'Prestador atualizado com sucesso!');
        } else {
            return redirect()->route('users.clientes')->with('success', 'Cliente atualizado com sucesso!');
        }
    }

    // Excluir Usuários
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Verifica se o usuário é cliente ou prestador
        $isPrestador = $user->role === 'prestador';

        // Exclui o usuário
        $user->delete();

        // Redireciona para a lista correta
        if ($isPrestador) {
            return redirect()->route('users.prestadores')->with('success', 'Prestador excluído com sucesso!');
        } else {
            return redirect()->route('users.clientes')->with('success', 'Cliente excluído com sucesso!');
        }
    }
}


