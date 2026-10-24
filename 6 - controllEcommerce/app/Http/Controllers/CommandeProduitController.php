<?php

namespace App\Http\Controllers;

use App\Models\CommandeProduit;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = CommandeProduit::join('produits', 'commande_produits.produit_id', '=', 'produits.id')
    ->join('utilisateurs', 'commande_produits.utilisateur_id', '=', 'utilisateurs.id')
    ->select('commande_produits.id', 'produits.name', 'commande_produits.quantity', 'commande_produits.price', 'utilisateurs.name as client_name')
    ->orderBy('commande_produits.id')
    ->get()
    ->groupBy('id');
return view("commandes.commande",compact("commands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = CommandeProduit::latest()->value("id") + 1;
        $cart = $request->session()->get('cart', []);
        // dd($cart);
        
        foreach ($cart as $produitId => $item) {
            $product = Produit::find($produitId);
            $commandeProduit = new CommandeProduit();
            $commandeProduit->id = $id;
            $commandeProduit->utilisateur_id = $request->session()->get("client");
            $commandeProduit->produit_id = $produitId;
            $commandeProduit->quantity = $item['quantity'];
            $commandeProduit->price = $product->price * $item['quantity'];
            // Set other properties if needed
            $commandeProduit->save();
        }
    
        // Clear the cart after storing the commandes produits
        $request->session()->forget('cart');
    
        return redirect("/panier")->with('success', 'Commande created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $clientId = $request->session()->get("client");
        $commands = CommandeProduit::where('utilisateur_id', $clientId)
        ->join('produits', 'commande_produits.produit_id', '=', 'produits.id')
        ->select('commande_produits.id', 'produits.name', 'commande_produits.quantity', 'commande_produits.price')
        ->orderBy('commande_produits.id')
        ->get()
        ->groupBy('id');
    

    
    
    
        return view('commandes.commandesclient', ['commands' => $commands]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeProduit $commandeProduit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeProduit $commandeProduit)
    {
        //
    }
}
