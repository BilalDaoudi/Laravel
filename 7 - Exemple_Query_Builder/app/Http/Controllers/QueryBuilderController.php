<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    //
    public function Afficher()
    {
        // get all -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')->get();
        // return view('Afficher',['rows'=>$rows]);



        // selection des Colonnes -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->select(['Matricule','Salaire'])
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
      
        // where -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->where('Salaire','>=',10000)
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
       
        
        // and where -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->where('Salaire','>=',10000)
        // ->where('Matricule','<',5000)
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
      
        
        // or where -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->where('Salaire','>=',10000)
        // ->orWhere('Matricule','<',6000)
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
      
        
        // whereBetween --------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->whereBetween('Salaire',[8000,10000])
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
     
        
        //  whereIn -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->whereIn('Salaire',[8000,9500,11000])
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
        
        
        // whereNotIn -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->whereNotIn('Salaire',[8000,9500,11000])
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
      
        // LIKE -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->select(['Matricule','Nom','Prenom'])
        // ->where('Nom','LIKE','D%')
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
      
        // la fonction value -------------------------------------------------------------------------------------------
        // $Sal=DB::table('Employe')
        // ->where('Matricule',6007)
        // ->value('Salaire');
        // echo $Sal;

        
        // Aggregations -------------------------------------------------------------------------------------------
        // $NbEmployes=DB::table('Employe')->count();
        // echo "Nombre Employés :".$NbEmployes."<br>";
        
        // $MaxSalaire=DB::table('Employe')
        // ->max('Salaire');
        // echo "Max Salaire :".$MaxSalaire."<br>";

        // $MinSalaire=DB::table('Employe')
        // ->min('Salaire');
        // echo "Min Salaire :".$MinSalaire."<br>";

        // $MoyenneSalaire=DB::table('Employe')
        // ->avg('Salaire');
        // echo "Moyenne Salaire :".$MoyenneSalaire."<br>";
        
        // first --------------------------------------------------------------------------------------------
        // $row=DB::table('Employe')
        // ->first(['Matricule','Nom']); 
        // return view('Afficher',['row'=>$row]);
        // Attention Affichage de row
      
        
        // orderBy -------------------------------------------------------------------------------------------
        // $rows=DB::table('Employe')
        // ->select(['Matricule','Nom','Salaire'])
        // ->orderBy('Salaire','asc')
        // ->get();
        // return view('Afficher',['rows'=>$rows]);

        
        // groupBy -------------------------------------------------------------------------------------------
        // $rows=DB::table("Projet")
        // ->selectRaw('CodeCategorie,count(NumProjet) as Nb')
        // ->groupBy('CodeCategorie')
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
        

        // groupBy et having --------------------------------------------------------------------------------------------
        // $rows=DB::table("Projet")
        // ->selectRaw('CodeCategorie,count(NumProjet) as Nb')
        // ->groupBy('CodeCategorie')
        // ->having('Nb','>=',5)
        // ->get();
        // return view('Afficher',['rows'=>$rows]);
    
        
        // join ---------------------------------------------------------------------------------------------
        // $rows=DB::table("Projet")
        // ->join('CategorieProjet','Projet.CodeCategorie','=','CategorieProjet.CodeCategorie')
        // ->select(['NumProjet','Libelle'])
        // ->get();
        // return view('Afficher',['rows'=>$rows]);

        // delete ---------------------------------------------------------------------------------------------
        // $nb=DB::table("Employe")
        // ->where('Matricule',77222)
        // ->delete();
        // echo $nb;


        
        // update ---------------------------------------------------------------------------------------------
        // $nb=DB::table("Employe")
        // ->where('Matricule',7002)
        // ->update(['Nom'=>'ChangeNom','Prenom'=>'ChangePrenom']);
        // echo $nb;

       
        // insert ---------------------------------------------------------------------------------------------
        // $nb=DB::table("Employe")
        // ->insert([
        //             'Matricule'=>5144,
        //             'Nom'=>'Moukhtari',
        //             'Prenom'=>'Jamila',
        //             'DateNaissance'=>'1978-5-24',
        //             'Salaire'=>9500
        // ]);
        // echo $nb;
        
        //$rows=DB::table("Employe")->get();
        //return View("GetData",['rows'=>$rows]);
        
    }
}
