<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Depose;
use App\Models\Devise;
use Illuminate\Http\Request;

class DeposeController extends Controller
{
    function index($client,$devise){
        $deposes = Depose::all()->where("client",$client)->where("devise",$devise);
        $devise = Devise::all()->where("symbol", $devise)->first();
        $devises = Devise::all();
        $client = Client::all()->where("username", $client)->first();
        return view("depose",compact("client","devise","deposes","devises"));
    }

    public function add(Request $request) {
        $depose = Depose::create([
            'date_depose' => $request->date_depose,
            'client' => $request->client,
            'amount' => $request->amount,
            "devise" => $request->devise,
            'commentaire' => $request->commentaire,
        ]);
        return  redirect()->route('deposes.index',['client' =>$request->client,'devise' => $request->devise])->with('success', 'Convert a été créée avec succès.');
    
    }

    public function update(Request $request){
        $Depose = Depose::find($request->id);
        $Depose->date_depose = $request->date_depose;
        $Depose->amount =  $request->amount;
        $Depose->commentaire = $request->commentaire;
        $Depose->save();
        return  redirect()->route('deposes.index', ['client' =>$request->client, 'devise' => $request->devise])->with('success', 'Convert a été sauvegardée avec succès.');
    
    }

    public function delete(Request $request){
        $transfert = Depose::all()->where("id", $request->transfert)->first();
        $transfert->delete();
        return  redirect()->route('deposes.index', ['client' =>$request->client_principale, 'devise' => $request->devise])->with('error', 'Transfert a été supprimée avec succès.');
    }


}
