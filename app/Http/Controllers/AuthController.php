<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Tela de pré-cadastro
    public function showPreCadastro()
    {
        return view('auth.pre-cadastro');
    }

    // Tela de cadastro
    public function showCadastro($tipo)
    {
        if (!in_array($tipo, ['cliente', 'prestador'])) {
            abort(404); // Caso o tipo não seja válido
        }

        return view('auth.cadastro', ['tipo' => $tipo]);
    }

    // Salvar cadastro
    public function storeCadastro(Request $request, $tipo)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $tipo, // Define o tipo de usuário
        ]);

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
