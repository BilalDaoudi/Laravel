<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodoListController extends Controller
{
    public function index($date = NULL)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if ($date === NULL)
            $date = Carbon::now()->format('Y/m/d');

        $todolists = DB::table('todolists')
            ->where('user', Auth::user()->id)
            ->where('date', $date)
            ->get();
        // dd($todolists);
        return view('todolist', compact('todolists'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'date_add' => 'required',
        ]);

        $user = Auth::user()->id;
        DB::table('todolists')->insert([
            'user' => $user,
            'description' => $validatedData['description'],
            'date' => $request->date_add,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Tâche ajoutée avec succès.');
    }

    public function delete($id)
    {
        DB::table('todolists')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Supprimé avec succès.');
    }

    public function valider($id)
    {
        DB::table('todolists')->where('id', $id)->update(['statut' => 'valider']);
        return redirect()->back()->with('success', 'Validé avec succès.');
    }

    public function play($id)
    {
        DB::table('todolists')->where('id', $id)->update(['statut' => 'encours']);
        return redirect()->back()->with('success', 'bon courage.');
    }
}
