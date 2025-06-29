<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.chat');
    }

    public function reply(Request $request, $id)
    {
        $request->validate(['reply' => 'required|string']);
        $message = Message::findOrFail($id);
        $message->reply = $request->reply;
        $message->save();

        return response()->json(['status' => 'ok']);
    }
}
