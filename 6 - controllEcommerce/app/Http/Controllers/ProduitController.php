<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category');
        $categories = Categorie::all();
        
        if ($selectedCategory) {
            $produits = Produit::whereHas('categorie', function ($query) use ($selectedCategory) {
                $query->where('id', $selectedCategory);
            })->get();
        } else {
            $produits = Produit::all();
        }
    
        return view('produits.index', compact('produits', 'categories', 'selectedCategory'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categorie=  Categorie::all();
        return view('produits.create',compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            
        }
        $price = $request->input('price');
     
        Produit::create([
            'name' => $name,
            'description' => $description,
            'image' => $filename,
            'quantite' => $request->input('quantite'),
            'price' => $price,
            'categorie_id' => $request->input('categorie')
        ]);
    
      return redirect()->route('produits.index')->with('success', 'Product created successfully.');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
    
         $namecat=Categorie::all();
         
        return view('produits.edit',compact('produit','namecat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $name=$request->input('name');
        $description=$request->input('description');
        $price=$request->input('price');
        $idcat=Categorie::where('name',$request->input('categorie'))->value('id');
        
$produit->update([
    'name'=>$name,
    "description"=>$description,
    "price"=>$price,
    "categorie_id"=>$idcat

]);
return redirect()->route("produits.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route("produits.index");
    }
}
