<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'connexion']);
    }
    public function index()
    {
        // $clients = Client::all();
        $users = User::where('role', "comptable")->get();
        return view('comptables', compact('users'));
    }
    public function add(Request $request)
    {
        $existingComptable = User::where('username', $request->username)->first();
        if ($existingComptable) {
            return redirect()->route("comptables.index")->with('error', 'Le comptable avec cette identifient existe déjà.');
        }
        $comptable = User::create([
            'username' => $request->username,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'password' => Hash::make($request->username),
            'role' => 'comptable',
            'bloque' => 'non',
        ]);
        return redirect()->route("comptables.index")->with('success', 'Le comptable a été créée avec succès.');
    }
    public function delete(Request $request)
    {
        $User = User::where('username', $request->username)->first();
        if ($User) {
            $User->delete();
            return redirect()->route("comptables.index")->with('error', 'Le comptable a été supprimé avec succès.');
        }
    }
    public function update(Request $request)
    {
        $User = User::where('username', $request->username)->first();
        if ($User) {
            $User->nom = $request->nom;
            $User->prenom = $request->prenom;
            $User->save();
            return redirect()->route("comptables.index")->with('success', 'Le comptable a été modifié avec succès.');
        }
    }
    public function update_password(Request $request)
    {
        if ($request->password === $request->password_confirmation) {
            $User = User::where('username', $request->username)->first();
            if ($User) {
                $User->password = Hash::make($request->password);
                $User->save();
                return redirect()->route("comptables.index")->with('success', 'Le comptable a été modifié le mot de passe avec succès.');
            }
        } else
            return redirect()->route("comptables.index")->with('error', 'Confirmer le mot de passe');
    }
    public function update_verrouiller(Request $request)
    {
        $User = User::where('username', $request->username)->first();
        if ($User) {
            $value = $User->bloque;
            $User->bloque = $value === "non" ? "oui" : "non";
            $User->save();
            $message =  $value === "non" ? "bloqué" : "débloqué";
            return redirect()->route("comptables.index")->with('success', 'Le comptable a été modifié ' . $message . ' avec succès.');
        }
    }

    public function permission_clients($userId)
    {
        $user = User::findOrFail($userId);
        $userClients = $user->clients;
        $userClientIds = $userClients->pluck('username')->toArray();

        $allClients = Client::all();
        $data = [
            'user' => $user,
            'allClients' => $allClients,
            'userClientIds' => $userClientIds,
        ];
        return response()->json($data);
    }
    public function add_permission_clients(Request $request)
    {
        $array = $request->toArray();
        $clients = array_slice($array, 2);
        DB::table('permission_clients')->where('utilisateur', $request->username)->delete();
        $data = [];
        // $clients = [];
        foreach ($clients as $client) {
            $data[] = [
                'utilisateur' => $request->username,
                'client' => $client,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('permission_clients')->insert($data);
        return redirect()->route("comptables.index")->with('success', 'Les permission a été modifié avec succès.');
    }


    public function connexion()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->bloque === 'oui') {
                return redirect()->back()->with('error', 'Votre compte est bloqué.')->withInput();
            } else {
               // Add Cookie and sent it to global variable tht i can check which is moderateur or admin
               $data = ["role"=>Auth::user()->role,"username" => Auth::user()->username];
               Cookie::queue(Cookie::make("user_role",json_encode($data)));
                return redirect()->intended('/');
            }
        } else {
            return redirect()->back()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect.')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
