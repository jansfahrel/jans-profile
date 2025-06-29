<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            // optional
            'name' => 'nullable|string',
            'is_admin' => 'boolean',
        ]);

        Message::create([
            'name' => $request->name ?? null,
            'message' => $request->message,
            'is_admin' => $request->is_admin ?? false,
        ]);

        return response()->json(['status' => 'ok']);
    }

    public function index()
    {
        return Message::latest()->get();
    }
}
