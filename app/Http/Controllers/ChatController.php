<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // Modelo para mensajes
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $users = \App\Models\User::where('id', '!=', $authUser->id)->get();
        $messages = Message::where('sender_id', $authUser->id)
            ->orWhere('receiver_id', $authUser->id)
            ->get();

        return view('chat', compact('users', 'authUser', 'messages'));
    }

    public function chat()
{
    $users = User::where('id', '!=', auth()->id())->get();
    $messages = Message::where('sender_id', auth()->id())
                       ->orWhere('receiver_id', auth()->id())
                       ->get();

    return view('chat', compact('users', 'messages'));
}


    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->message,
        ]);

        return response()->json(['message' => $message]);
    }
}
