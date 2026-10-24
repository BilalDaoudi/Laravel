<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Devise;
use App\Models\Transfert;
use Illuminate\Http\Request;

class TransfertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($client, $devise)
    {
        $client = Client::all()->where("username", $client)->first();
        $devise = Devise::all()->where("symbol", $devise)->first();
        $clients = Client::all();
        $devises = Devise::all();
        $transferts = Transfert::where('expediteur', $client->username)
            ->orWhere('recepteur', $client->username)       
            ->get();
        return view('transfert', compact("client","clients", "devise", "devises", "transferts"));
    }
    public function add(Request $request){
        $expediteur = $request->type == "expediteur" ? $request->client : $request->client_principale;
        $recepteur =  $request->type == "recepteur" ? $request->client : $request->client_principale;
        $transfert = Transfert::create([
            'date' => $request->date,
            'expediteur' => $expediteur,
            'recepteur' => $recepteur,
            'devise' => $request->devise,
            'solde' => $request->solde,
        ]);
        return  redirect()->route('transfert.index', ['client' =>$request->client_principale, 'devise' => $request->devise])->with('success', 'Transfert a été créée avec succès.');
    }
    public function update(Request $request){
        $expediteur = $request->type == "expediteur" ? $request->client : $request->client_principale;
        $recepteur =  $request->type == "recepteur" ? $request->client : $request->client_principale;
        $transfert = Transfert::find($request->id);
        $transfert->date = $request->date;
        $transfert->expediteur =  $expediteur;
        $transfert->recepteur =  $recepteur;
        $transfert->solde = $request->solde;
        $transfert->save();
        return  redirect()->route('transfert.index', ['client' =>$request->client_principale, 'devise' => $request->devise])->with('success', 'Transfert a été sauvegardée avec succès.');
    }
    
    public function delete(Request $request){
        $transfert = Transfert::all()->where("id", $request->transfert)->first();
        $transfert->delete();
        // dd($transfert);
        return  redirect()->route('transfert.index', ['client' =>$request->client_principale, 'devise' => $request->devise])->with('error', 'Transfert a été supprimée avec succès.');
    }
}
