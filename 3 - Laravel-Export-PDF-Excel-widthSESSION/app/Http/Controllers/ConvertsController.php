<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Converte;
use App\Models\Devise;
use Illuminate\Http\Request;

class ConvertsController extends Controller
{
    public function index($client,$devise){
        $converts = Converte::all()->where("client_username", $client)->where("devise", $devise);
        $devise = Devise::all()->where("symbol", $devise)->first();
        $client = Client::all()->where("username", $client)->first();
        $devises = Devise::all();
        return view("converts",compact("converts","devise","client","devises"));
    }

    public function add(Request $request){

        $Convert = Converte::create([
            'date' => $request->date,
            'client_username' => $request->client_username,
            'convertedSymbol' => $request->convertedSymbol,
            'amount' => $request->amount,
            "devise" => $request->devise,
            'commentaire' => $request->commentaire,
        ]);
        return  redirect()->route('converts.index', ['client' =>$request->client_username, 'devise' => $request->devise])->with('success', 'Convert a été créée avec succès.');
    }

    public function update(Request $request){
        $Converte = Converte::find($request->id);
        $Converte->date = $request->date;
        $Converte->convertedSymbol =  $request->convertedSymbol;
        $Converte->client_username =  $request->client_username;
        $Converte->amount =  $request->amount;
        $Converte->commentaire = $request->commentaire;
        $Converte->save();
        return  redirect()->route('converts.index', ['client' =>$request->client_username, 'devise' => $request->devise])->with('success', 'Convert a été sauvegardée avec succès.');
    }

    public function delete(Request $request){
        $transfert = Converte::all()->where("id", $request->transfert)->first();
        $transfert->delete();
        return  redirect()->route('converts.index', ['client' =>$request->client_principale, 'devise' => $request->devise])->with('error', 'Transfert a été supprimée avec succès.');
    }
}
