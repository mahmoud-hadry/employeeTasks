<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
use App\Models\Employee;

class ChatController extends Controller
{
    public function getMessages(Employee $user)
    {
        return Message::query()
            ->where(function ($query) use ($user) {
                $query->where('sender_id', auth()->id())
                    ->where('receiver_id', $user->id);
            })
            ->orWhere(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', auth()->id());
            })
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function show(Employee $user)
    {
        return view('chat', [
            'user' => $user
        ]);
    }

    public function sendMessage(Request $request, Employee $user)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'text' => $request->input('message')
        ]);

        broadcast(new MessageSent($message));

        return response()->json($message);
    }
}