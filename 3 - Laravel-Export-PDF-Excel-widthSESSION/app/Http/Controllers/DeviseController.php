<?php

namespace App\Http\Controllers;

use App\Models\Devise;
use App\Models\Entreprise; // Added for getBaseDevise method
use Illuminate\Http\Request;

class DeviseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $devise = Devise::all();
        $symbols = $this->getSymbols();
        $entreprise = Entreprise::first(); // Assuming you want to fetch the first entreprise record
    
        return view('devise', compact('devise', 'symbols', 'entreprise'));
    }
    

    public function add(Request $request)
    {
        $existingDevise = Devise::where('symbol', $request->symbol)->first();
        
        if ($existingDevise) {
            return redirect()->route("devise.index")->with('error', 'Le Devise avec cette identifient existe déjà.');
        }
        
        $devise = Devise::create([
            'symbol' => $request->symbol,
            'description' => $request->description,
            'base' => $request->base,
        ]);
        
        return redirect()->route("devise.index")->with('success', 'Le devise a été créée avec succès.');
    }

    public function delete(Request $request)
    {
        $devise = Devise::where('symbol', $request->symbol)->first();
        
        if ($devise) {
            $devise->delete();
            return redirect()->route("devise.index")->with('success', 'Le Devise a été supprimé avec succès.');
        } else {
            return redirect()->route("devise.index")->with('error', 'Le Devise n\'a pas été trouvé.');
        }
    }

    public function update(Request $request)
    {
        $devise = Devise::where('symbol', $request->symbol)->first();
        
        if ($devise) {
            $devise->symbol = $request->symbol;
            $devise->description = $request->description;
            $devise->base = $request->base;
            $devise->save();
            return redirect()->route("devise.index")->with('success', 'Le Devise a été modifié avec succès.');
        } else {
            return redirect()->route("devise.index")->with('error', 'Le Devise n\'a pas été trouvé.');
        }
    }

    /* 
    public function search($devise = NULL)
    {
        if ($devise == NULL) {
            $devise = Devise::all();
        } else {
            $devise = Devise::where('symbol', 'LIKE', '%' . $devise . '%')
                            ->orWhere('description', 'LIKE', '%' . $devise . '%')
                            ->get();
        }
        return $devise;
    }
    */

    public function getSymbols()
    {
        $symbols = Devise::pluck('symbol');
        return $symbols;
    }

    public function getBaseDevise($symbol)
    {
        $devise = Devise::where('symbol', $symbol)->first();
        if($devise) {
            return $devise->base_devise;
        } else {
            return "Base devise not found for the selected symbol.";
        }
    }
    

    public function updateBaseDevise(Request $request)
{
    $symbol = $request->input('symbol');
    // Assuming you have a single entreprise record for simplicity
    $entreprise = Entreprise::first();
    if ($entreprise) {
        $entreprise->base_devise = $symbol;
        $entreprise->save();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Entreprise not found']);
    }
}

}
