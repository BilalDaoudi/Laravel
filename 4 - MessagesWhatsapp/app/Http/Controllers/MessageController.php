<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(10);
        return view('Messages', ["rows" => $messages]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);
        Message::create(["description" => $request->description ]);
         return redirect()->back()->with("success", "Message a été ajouté avec succès ");
    }

    public function delete($id)
    {
        
        $message = Message::find($id);
        $message->delete();
        return back()->with("delete", "Message a été supprimée avec succès ");
    }

    public function search($message = NULL)
    {
        // REGEXP
        if ($message == NULL) {
            $messages = Message::all()->forPage(1, 10);
        } else {
            $messages = DB::table('Messages')->where(function ($query) use ($message) {
                $query->where('description', 'REGEXP', $message);
            })->get()->forPage(1, 10);
        }
        echo $messages;
    }
}
