<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Prestador;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listarPrestadores()
    {
        $prestadores = User::where('role', 'prestador')->get();
        return view('users.prestadores', compact('prestadores'));
    }

    public function listarClientes()
    {
        $clientes = User::where('role', 'cliente')->get();
        return view('users.clientes', compact('clientes'));
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


