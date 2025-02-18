<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Prestador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if(auth::user()->role != 'prestador'){
            // Redirecionamento com mensagem de erro
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('error', 'Acesso negado! Apenas prestadores podem acessar essa página.');
            } elseif ($user->role === 'cliente') {
                return redirect()->route('dashboard')->with('error', 'Acesso negado! Apenas prestadores podem acessar essa página.');
            }
            return redirect()->route('home')->with('error', 'Acesso negado.');

            //return redirect('/');
        }
        return $next($request);
    }
}
