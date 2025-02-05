<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cliente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if(auth::user()->role != 'cliente'){
            // Mensagem de erro e redirecionamento correto
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('error', 'Acesso negado! Apenas clientes podem acessar essa página.');
            } elseif ($user->role === 'prestador') {
                return redirect()->route('prestador.dashboard')->with('error', 'Acesso negado! Apenas clientes podem acessar essa página.');
            }
            return redirect()->route('home')->with('error', 'Acesso negado.');

            //return redirect('/');
        }
        return $next($request);
    }
}
