<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonneController extends Controller
{
    
    public function GetAll(){
        $rows = DB::select("select * from Personne");
        return view("Personne/Personnes",["Personnes"=>$rows]);
    }

    public function PageAdd(){
        return view("Personne.AddPersonne");
    }

    public function AddPersonne(Request $req){
        DB::insert("insert into Personne values(?,?,?,?,?,?)",
        [
            $req->input("cin"),
            $req->input("nom"),
            $req->input("prenom"),
            $req->input("sexe"),
            $req->input("datenaissance"),
            $req->input("nationalite")
        ]);
        return $this->GetAll();
    }
    public function PageUpdate($cin){
        $row = DB::selectOne("select * from Personne where Cin = ?",[$cin]);
        return view("Personne.UpdatePersonne",["Personne" => $row]);
    }

    public function UpdatePersonne(Request $req){
        DB::update("update Personne set Nom = ? ,Prenom = ?,Sexe = ? ,datenaissance = ?,
                    Nationalite = ? where Cin = ?",
        [
            $req->input("nom"),
            $req->input("prenom"),
            $req->input("sexe"),
            $req->input("datenaissance"),
            $req->input("nationalite"),
            $req->input("cin")
        ]);
        return $this->GetAll();
    }

    public function DeletePersonne($cin){
        DB::delete("delete from  Personne where cin = :c",["c" => $cin]);
        return redirect()->route("page.personnes");
    }
}
