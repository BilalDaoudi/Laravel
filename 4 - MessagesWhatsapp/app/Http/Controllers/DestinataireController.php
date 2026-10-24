<?php

namespace App\Http\Controllers;

use App\Imports\MyImport;
use App\Models\Destinataire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DestinataireController extends Controller
{
    public function index()
    {
        $destinataires = Destinataire::paginate(10);
        // $destinataires = Destinataire::all();
        return view('Destinataires', ["rows" => $destinataires]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required' //|unique:destinataires,numerotelephone
        ]);
        Destinataire::create(["nom" => $request->nom, "numerotelephone" => $request->telephone]);
        return redirect()->back()->with("success", "Destinataire a été ajouté avec succès ");
    }

    public function edit($id)
    {
        $destinataire = Destinataire::find($id);
        return view('EditDestinataire', ["row" => $destinataire]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required'
        ]);
        $destinataire = Destinataire::find($id);
        $destinataire->nom = $request->nom;
        $destinataire->numerotelephone = $request->telephone;
        $destinataire->save();
        return redirect()->route("destinataires")->with("success", "Destinataire a été sauvgardé avec succès");
    }
    public function delete($id)
    {

        $destinataire = Destinataire::find($id);
        $destinataire->delete();
        return back()->with("delete", "Destinataire a été supprimée avec succès ");
    }

    public function search($destinataire = NULL)
    {
        if ($destinataire == NULL) {
            $destinataires = Destinataire::all()->forPage(1, 10);
        } else {
            $destinataires = DB::table('destinataires')->where(function ($query) use ($destinataire) {
                $query->where('nom', 'REGEXP', $destinataire);
            })->get()->forPage(1, 10);
        }
        echo $destinataires;
    }
    public function import(Request $request)
    {
        $request->validate([
            'fichier' => 'required|mimes:xls,xlsx,csv'
        ]);
        $file = $request->file('fichier');
        $donnees = Excel::toArray([], $file);
        $data = $donnees[0];
        $T_values = [];
        for ($i = 1 ; $i < count($data) ;$i++ ) {
            if ($data[$i][0] == "" && $data[$i][1] == "")
                break;
            $T_values[] = [
                'nom' => $data[$i][0],
                'numerotelephone' => $data[$i][1]
            ];
        }
        Destinataire::insert($T_values);
        return redirect()->back()->with("success", "Destinataires a été ajoutés avec succès ");
    }
}
