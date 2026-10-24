<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProduitController extends Controller
{
    public function index()
    {
        $produits = Auth::user()->produits;
        $token = Auth::user()->createToken('Test')->plainTextToken;  // Génération du token
        return view('produits.index', compact('produits', 'token'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
        ]);

        Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'user_id' => Auth::id(), // Assignation de l'ID de l'utilisateur connecté
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit(Produit $produit)
    {
        // Vérifier si l'utilisateur authentifié est le propriétaire du produit
        if (Auth::user()->id !== $produit->user_id) {
            return redirect()->route('produits.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ce produit.');
        }

        return view('produits.edit', compact('produit'));
    }


    public function update(Request $request, Produit $produit)
    {
        // Vérifier si l'utilisateur authentifié est le propriétaire du produit
        if (Auth::user()->id !== $produit->user_id) {
            return redirect()->route('produits.index')->with('error', 'Vous n\'êtes pas autorisé à mettre à jour ce produit.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour.');
    }


    public function destroy(Produit $produit)
    {
        // Vérifier si l'utilisateur authentifié est le propriétaire du produit
        if (Auth::user()->id !== $produit->user_id) {
            return redirect()->route('produits.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce produit.');
        }

        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé.');
    }



}
