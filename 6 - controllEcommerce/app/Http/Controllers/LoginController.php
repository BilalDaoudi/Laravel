<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('log.login');
    }

    /**
     * Handle the login form submission.
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Utilisateur::where('email',$email)->where('password',$password)->first();

        if ($user  && $user->role==='client' ) {

            $request->session()->put('client',  $user->id);
            return redirect('/produits');
        }
        elseif($user && $user->role==='admin' ){
            $request->session()->put('admin',  $user->id);
            return redirect('/produits');
        }
        return back()->withErrors([
            'email' => 'email maybe is wrong.',
            'password' => 'password maybe is wrong.'
        ]);
    }
    public function logout(Request $r)
    {
        
        session()->forget('client');
        session()->forget('admin');


        return redirect('/login');
    }
}
