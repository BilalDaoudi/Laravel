<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategorieController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
    }
    public function index()
    {
        
        Gate::authorize("IsAdmin");
        $categories = Categorie::paginate(7);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        Gate::authorize("IsAdmin");
        return view('categories.create');
    }

    public function show(Categorie $categorie){
        Gate::authorize("IsAdmin");
        $produits = $categorie->produits;
        return view('categories.show', compact('categorie',"produits"));
    }
    public function store(CategorieRequest $request)
    {
        Gate::authorize("IsAdmin");
        $categorie = Categorie::create([
            'description' => $request->description,
        ]);

        return redirect()->route("categories.index")->with('success', 'La catégorie a été créée avec succès.');
    }

    public function edit(Categorie $categorie)
    {
        Gate::authorize("IsAdmin");
        return view('categories.edit', compact('categorie'));
    }

    public function update(CategorieRequest $request, Categorie $categorie)
    {
        Gate::authorize("IsAdmin");
        $categorie->update([
            'description' => $request->description,
        ]);

        return redirect()->route("categories.index")->with('success', 'La catégorie a été mise à jour avec succès.');
    }

    public function destroy(Categorie $categorie)
    {
        Gate::authorize("IsAdmin");
        $categorie->delete();
        return back()->with('success', 'La catégorie a été supprimée avec succès.');
    }
}


?>