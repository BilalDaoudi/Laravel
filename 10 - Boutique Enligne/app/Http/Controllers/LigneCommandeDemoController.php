<?php

namespace App\Http\Controllers;

use App\Models\LigneCommandeDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LigneCommandeDemoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        Gate::authorize("IsUser");
        $produits = LigneCommandeDemo::all()->where("id_user",Auth::user()->id);
        return view("commandes.panier",compact("produits"));
    }

    public function create()
    {
        //
        
    }

    public function store(Request $request)
    {
        Gate::authorize("IsUser");
        // echo "Daoudi";
        $ExisteProduitByUser = LigneCommandeDemo::all()->where("id_user", Auth::user()->id)->where("codeproduit", $request->codeproduit)->first();
        if ($ExisteProduitByUser) {
            $ExisteProduitByUser->quantite = $ExisteProduitByUser->quantite + $request->quantite;
            $ExisteProduitByUser->save();
        } else {
            LigneCommandeDemo::create(["id_user"=>Auth::user()->id,"codeproduit"=>$request->codeproduit,"quantite"=>$request->quantite]);
        }
        $lignecommandedmo = LigneCommandeDemo::all()->where("id_user", Auth::user()->id);
            echo json_encode($lignecommandedmo->count());
    }

    public function show(LigneCommandeDemo $ligneCommandeDemo)
    {
        //
    }

    public function edit(LigneCommandeDemo $ligneCommandeDemo)
    {
        //
    }


    public function update(Request $request, LigneCommandeDemo $ligneCommandeDemo)
    {
        //
    }

    public function destroy($id)
    {
        Gate::authorize("IsUser");
        $ligneCommandeDemo = LigneCommandeDemo::all()->find($id);
        $ligneCommandeDemo->delete();
        return back()->with('success', 'Produit supprimée avec succès');
    }
}
