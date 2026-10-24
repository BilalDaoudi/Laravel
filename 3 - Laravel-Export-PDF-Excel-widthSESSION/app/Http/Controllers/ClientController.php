<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Exports\ExportTable;
use App\Models\Client;
use App\Models\Devise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $devises = Devise::all();
        $clients = Client::all();
        return view('clients', compact('clients', 'devises'));
    }
    public function add(Request $request)
    {
        $existingClient = Client::where('username', $request->username)->first();
        if ($existingClient) {
            return redirect()->route("clients.index")->with('error', 'Le client avec cette identifient existe déjà.');
        }
        $client = Client::create([
            'username' => $request->username,
            'nom' => $request->nom,
            'localisation' => $request->localisation,
            'commentaire' => $request->commentaire,
            'password' => Hash::make($request->username),
            'bloque' => 'non',
        ]);
        return redirect()->route("clients.index")->with('success', 'Le client a été créée avec succès.');
    }
    public function delete(Request $request)
    {
        $Client = Client::where('username', $request->username)->first();
        if ($Client) {
            $Client->delete();
            return redirect()->route("clients.index")->with('error', 'Le client a été supprimé avec succès.');
        }
    }
    public function update(Request $request)
    {
        $Client = Client::where('username', $request->username)->first();
        if ($Client) {
            $Client->nom = $request->nom;
            $Client->localisation = $request->localisation;
            $Client->commentaire = $request->commentaire;
            $Client->save();
            return redirect()->route("clients.index")->with('success', 'Le client a été modifié avec succès.');
        }
    }
    public function update_password(Request $request)
    {
        if ($request->password === $request->password_confirmation) {
            $Client = Client::where('username', $request->username)->first();
            if ($Client) {
                $Client->password = Hash::make($request->password);
                $Client->save();
                return redirect()->route("clients.index")->with('success', 'Le client a été modifié le mot de passe avec succès.');
            }
        } else
            return redirect()->route("clients.index")->with('error', 'Confirmer le mot de passe');
    }
    public function update_verrouiller(Request $request)
    {
        $Client = Client::where('username', $request->username)->first();
        if ($Client) {
            $value = $Client->bloque;
            $Client->bloque = $value === "non" ? "oui" : "non";
            $Client->save();
            $message =  $value === "non" ? "bloqué" : "débloqué";
            return redirect()->route("clients.index")->with('success', 'Le client a été modifié ' . $message . ' avec succès.');
        }
    }

    public function search($client = NULL)
    {
        if ($client == NULL) {
            $clients = Client::all();
        } else {
            $clients = DB::table('clients')->where(function ($query) use ($client) {
                $query->where('username', 'REGEXP', $client)
                    ->orWhere('nom', 'REGEXP', $client)
                    ->orWhere('localisation', 'REGEXP', $client)
                    ->orWhere('commentaire', 'REGEXP', $client);
            })->get();
        }
        echo $clients;
    }

    public function operation(Request $request)
    {
        $client = $request->client;
        $devise = $request->typedevise;
        return redirect()->route($request->page . '.index', ['client' => $client, 'devise' => $devise]);
    }
    public function export()
    {
        return Excel::download(new ExportTable, 'clients.xlsx');
    }
}
