<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        $user = $request->user();

        // Verifica a rota acessada e retorna a view correspondente
        if ($request->is('profile/admin')) {
            return view('profile.editadmin', compact('user'));
        } elseif ($request->is('profile/prestador')) {
            return view('profile.editprestador', compact('user'));
        } else
            // Rota padrão para usuários clientes
            return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // Redireciona com base no tipo de usuário
        if ($user->role === 'admin') { // Verifica se o usuário é admin
            return Redirect::route('profile.editadmin')->with('status', 'profile-updated');
        } elseif ($user->role === 'prestador') { // Verifica se é prestador
            return Redirect::route('profile.editprestador')->with('status', 'profile-updated');
        }
        // Usuário cliente

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
