<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if(auth::user()->role != 'admin'){
            // Redirecionamento com mensagem de erro
            if ($user->role === 'cliente') {
                return redirect()->route('dashboard')->with('error', 'Acesso negado! Apenas administradores podem acessar essa página.');
            } elseif ($user->role === 'prestador') {
                return redirect()->route('prestador.dashboard')->with('error', 'Acesso negado! Apenas administradores podem acessar essa página.');
            }
            return redirect()->route('home')->with('error', 'Acesso negado.');

            //return redirect('/');
        }
        return $next($request);
    }
}
