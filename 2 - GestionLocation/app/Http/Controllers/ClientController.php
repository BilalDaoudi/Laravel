<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    // ***************************************************** Liste Client ****************************************************************************************
    public function index()
    {
        // echo "bilal";
        $clients = Client::paginate(10);
        return view('Clients.ListeClients', ["rows" => $clients]);
    }

    // ***************************************************** Page Ajouter Client *********************************************************************************
    public function create()
    {
        return view('Clients.AjouterClient');
    }

    // ***************************************************** Ajouter Client ***************************************************************************************
    public function store(ClientRequest $request)
    {
        $T_values = $request->validated();
        Client::create($T_values);
        return to_route("client.index")->with("success", "Client a été ajouté avec succès ");
    }

    // ************************************************************************************************************************************************************
    public function show($id)
    {
        //
    }

    // ***************************************************** Page Modifier Client *********************************************************************************
    public function edit(Client $client)
    {

        return view('Clients.ModifierClient', ["row" => $client]);
    }

    // ***************************************************** Modifier Client *********************************************************************************
    public function update(Request $request, Client $client)
    {
        $T_values = $request->validate([
            "CIN" => "required",
            "Nom" => "required",
            "Prenom" => "required",
            "DateNaissance" => "required|date|before:" . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            "Nationalite" => "required",
            "Telephone" => "required",
            "Permis" => "required"
        ]);
        $client->fill($T_values)->save();
        return to_route("client.index")->with("success", "Client a été sauvgardé avec succès ");
    }

    // ***************************************************** Archiver Client *********************************************************************************
    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with("delete", "Client a été archivé avec succès ");
    }

    // ***************************************************** Rechercher Client *******************************************************************************
    public function search($client = NULL)
    {
        // REGEXP
        if ($client == NULL) {
            $clients = Client::all()->forPage(1, 10);
        } else {
            // $clients = DB::table("clients")->where("deleted_at",NULL)->where('CIN','REGEXP',$client)->get()->forPage(1,10);
            $clients = DB::table('clients')->where(function ($query) use ($client) {
                $query->where('CIN', 'REGEXP', $client)
                    ->orWhere('Nom', 'REGEXP', $client)
                    ->orWhere('Prenom', 'REGEXP', $client);
            })->whereNull('deleted_at')->get()->forPage(1, 10);
        }
        echo $clients;
    }

    // ***************************************************** Supprimer Client *******************************************************************************
    public function forcedelete($client)
    {
        Client::onlyTrashed()->where("CIN", $client)->forceDelete();
        return back()->with("delete", "Client a été supprimé avec succès ");
    }

    // ***************************************************** Afficher Client Archiver ************************************************************************
    public function archive()
    {
        $clients = Client::onlyTrashed()->paginate(10);
        return view('Clients.ArchiveClients', ["rows" => $clients]);
    }

    // ****************************************** Restore Client *********************************************************************************************
    public function restore($client)
    {
        Client::onlyTrashed()->find($client)->restore();
        return back()->with("success", "Client a été restauré avec succès ");
    }

    // ****************************************** Rechercher Client Archiver *********************************************************************************
    public function searcharchive($client = NULL)
    {
        if ($client == NULL)
            $clients = Client::all()->forPage(1, 10);
        else
            $clients = DB::table('clients')->where('CIN', 'REGEXP', $client)->whereNotNull('deleted_at')->get()->forPage(1, 10);
        echo $clients;
    }
}
