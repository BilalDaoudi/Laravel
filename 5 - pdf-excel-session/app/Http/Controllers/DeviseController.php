<?php

namespace App\Http\Controllers;

use App\Models\Devise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviseController extends Controller
{
    public function index()
    {
        $Devise = Devise::all();
        return view('Devise', compact('Devise'));
    }
    public function add(Request $request)
    {
        $existingDevise = Devise::where('Symbole', $request->Symbole)->first();
        if ($existingDevise) {
            return redirect()->route("Devise.index")->with('error', 'Le Devise avec cette identifient existe déjà.');
        }
        $Devise = Devise::create([
            'Symbole' => $request->Symbole,
            'Description' => $request->Description,

        ]);
        return redirect()->route("Devise.index")->with('success', 'Le Devise a été créée avec succès.');
    }
    public function delete(Request $request)
    {
        $devise = Devise::where('Symbole', $request->Symbole)->first();
        if ($devise) {
            $devise->delete();
            return redirect()->route("Devise.index")->with('success', 'La devise a été supprimée avec succès.');
        } else {
            return redirect()->route("Devise.index")->with('error', 'La devise spécifiée n\'existe pas.');
        }
    }
    
    
    public function update(Request $request)
    {
        $Devise = Devise::where('Symbole', $request->Symbole)->first();
        if ($Devise) {
            $Devise->Symbole = $request->Symbole;
            $Devise->Description = $request->Description;
            $Devise->save();
            return redirect()->route("Devise.index")->with('success', 'Le Devise a été modifié avec succès.');
        }
    }


    public function search($Devise = NULL){
        if ($Devise == NULL) {
            $Devise = Devise::all();
        } else {
            $Devise = DB::table('Devises')->where(function ($query) use ($Devise) {
                $query->where('Symbole', 'REGEXP', $Devise)
                    ->orWhere('Description', 'REGEXP', $Devise);

            })->get();
        }
        echo $Devise;
    }
}
