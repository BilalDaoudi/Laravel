<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function acheter($categorie = null)
    {
        Gate::authorize("IsUser");
        $categories = Categorie::all();
        if ($categorie == null)
            $produits = Produit::all();
        else
            $produits = Produit::all()->where("id_categorie", $categorie);

        return view('produit.acheter', compact('produits', 'categories'));
    }
    public function index()
    {
        Gate::authorize("IsAdmin");
        $produits = Produit::paginate(8);
        return view('produit.index', compact('produits'));
    }

    public function create()
    {
        Gate::authorize("IsAdmin");
        $categories = Categorie::all();
        return view('produit.create', compact('categories'));
    }

    public function store(ProduitRequest $request)
    {
        Gate::authorize("IsAdmin");
        $validatedData = $request->validated();
        $imagePath = $request->file('image')->store('public/images');
        // $liendata = explode("/", $imagePath);
        $imagePath = str_replace('public/', 'storage/', $imagePath);
        $validatedData['image'] = $imagePath;

        // echo $imagePath;
        Produit::create($validatedData);
        return redirect()->route("produits.index")->with('success', 'Produit créé avec succès');
    }

    public function show(Produit $produit)
    {
        // Afficher detail de Produit
    }

    public function edit(Produit $produit)
    {
        Gate::authorize("IsAdmin");
        // dd($produit);
        $categories = Categorie::all();
        return view('produit.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, Produit $produit)
    {
        $validatedData =$request->validate(
            [
                "codeproduit" => "required",
                "description" => "required",
                "prix" => "required",
                "id_categorie" => "required"
            ]
        );
        Gate::authorize("IsAdmin");
        $validatedData = $request->all();
        if ($request->hasFile('image')) {
            $liendatadelete = explode("/", $produit->image);
            // Storage::delete("public/images/" . $liendatadelete[2]);
            $imagePath = $request->file('image')->store('public/images');
            $liendata = explode("/", $imagePath);
            $validatedData['image'] = "storage/images/" . $liendata[2];
        }

        $produit->update($validatedData);
        return redirect()->route("produits.index")->with('success', 'Produit mis à jour avec succès');
    }

    public function destroy(Produit $produit)
    {
        Gate::authorize("IsAdmin");
        Storage::delete($produit->image);
        $produit->delete();
        return back()->with('success', 'Produit supprimé avec succès');
    }
}
