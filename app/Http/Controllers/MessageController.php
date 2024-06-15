<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all(); 
        return view('messages.index', ['messages' => $messages]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    Message::create($validatedData);
    return redirect('/messages')->with('success', 'Message sent successfully!');
}

}
