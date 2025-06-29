<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua user yang pernah kirim message (biar tidak kosong)
        $users = User::whereHas('messages')->with('messages')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $message = Message::findOrFail($id);
        $message->reply = $request->reply;
        $message->is_admin = true;
        $message->save();

        return back()->with('success', 'Balasan terkirim.');
    }
}
