<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Devise;
use App\Models\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($client, $devise)
    {
        $client = Client::all()->where("username", $client)->first();
        $devise = Devise::all()->where("symbol", $devise)->first();
        $devises = Devise::all();
        $operations = Operation::where('client', $client->username)
            ->where('devise', $devise->symbol)
            ->get();
        return view('operation', compact("client", "devise", "devises", "operations"));
    }
    public function add(Request $request){
        $operation = Operation::create([
            'date' => $request->date,
            'client' => $request->client,
            'comments' => $request->commentaire,
            'total' => $request->total,
            'quantity' => $request->quantite,
            'percentage' => $request->operation2add . $request->porcentage,
            'devise' => $request->devise,
            'type_operation' => $request->type,
            'ville' => $request->ville,
            'prix' => $request->prix,
        ]);
        
        return  redirect()->route('operation.index', ['client' =>$request->client, 'devise' => $request->devise])->with('success', 'L\'opération a été créée avec succès.');
       
        
    }
    public function update(Request $request){
        $operation = Operation::find($request->id);
        $operation->date = $request->date;
        $operation->comments = $request->commentaire;
        $operation->total = $request->total;
        $operation->quantity = $request->quantite;
        $operation->percentage = $request->operation2update . $request->porcentage;
        $operation->type_operation = $request->type;
        $operation->ville = $request->ville;
        $operation->prix = $request->prix;
        $operation->save();
        return  redirect()->route('operation.index', ['client' =>$request->client, 'devise' => $request->devise])->with('success', 'L\'opération a été sauvegardée avec succès.');
    }
    
    public function delete(Request $request){
        $operation = Operation::all()->where("id", $request->operation)->first();
        $operation->delete();
        return  redirect()->route('operation.index', ['client' =>$request->client, 'devise' => $request->devise])->with('error', 'L\'opération a été supprimée avec succès.');
    }
}
