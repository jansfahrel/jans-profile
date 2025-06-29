<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan form login admin
     */
    public function showLoginForm()
    {
        return view('admin.login'); // buat view ini di resources/views/admin/login.blade.php
    }

    /**
     * Proses login admin
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Cek apakah dia admin
            if (auth()->user()->is_admin) {
                return redirect()->route('admin.index')
                    ->with('success', 'Welcome back, Admin!');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Anda bukan admin.']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login')
            ->with('success', 'Anda telah logout.');
    }
}
