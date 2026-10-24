<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember_me'); // Vérifie si la case à cocher "Se souvenir de moi" est cochée

        if (Auth::attempt($credentials, $remember)) { // Utilise le paramètre $remember pour se souvenir de l'utilisateur
            if ($remember) {
                // Créer un cookie de rappel pour se souvenir de l'utilisateur
                $request->session()->regenerate();
                $rememberToken = Auth::user()->getRememberToken();
                cookie()->queue('remember_token', $rememberToken, 60 * 24 * 30); // Le cookie expirera après 30 jours (modifiable selon vos besoins)
            }
            return redirect()->route('todolist');
        }
        return back()->with('erreur', 'Nom d\'utilisateur ou mot de passe incorrect !');

        // $credentials = $request->only('username', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('todolist');
        // }
        // return back()->with('erreur', 'username or password incorrect !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function showInscriptionForm()
    {
        return view('inscription');
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'username.required' => 'Le champ nom d\'utilisateur est requis.',
            'nom.required' => 'Le champ nom est requis.',
            'prenom.required' => 'Le champ prénom est requis.',
            'email.required' => 'Le champ email est requis.',
            'password.required' => 'Le champ mot de passe est requis.',
            'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'username.unique' => 'Ce nom d\'utilisateur est déjà utilisé.',
            'email.unique' => 'Cette adresse email est déjà utilisée.'
        ]);

        User::create([
            'username' => $request->username,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // You can customize the redirect route after registration
        return redirect('/login')->with('success', 'Inscription réussie !');
    }
}
