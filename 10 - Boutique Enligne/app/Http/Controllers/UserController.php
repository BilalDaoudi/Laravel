<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        Gate::authorize("IsAdmin");
        $users = User::where("role","client")->paginate(9);
        return view("users.index",compact('users'));
        
    }

   public function create(){
        return view("login.inscription");
    }
    public function store(Request $req){
        $T_values = $req->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required|min:9|confirmed",
            "password_confirmation" => "required"
        ]);

        User::create(["name"=> $req->name,"email"=>$req->email,"password"=>Hash::make($req->password),"role"=>"client"]);
        return redirect()->route("login.show"); 
    }


    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Utilisateur Supprimé avec succès');
    }
}
