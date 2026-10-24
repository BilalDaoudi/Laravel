<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Categorie::all();
        return view('Categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Categorie::create($data);
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $Categorie)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $Categorie)
    {
        return view("Categories.edit",compact('Categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $Categorie)
    {
        $Categorie->update($request->all());
        return redirect()->route('categories.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $Categorie)
    {
        $Categorie->delete();
        return redirect()->route('users.index');
    }
}
