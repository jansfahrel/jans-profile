<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MessageController;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard user (user biasa login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ✨ Kirim pesan bubble chat
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

    // ✨ Lihat semua pesan user sendiri (jika perlu)
    Route::get('/my-messages', [MessageController::class, 'userMessages'])->name('messages.mine');
});

// ✨ Login & logout admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ✨ Dashboard Admin & Balas Pesan
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // Tampilkan semua pesan dari semua user
    Route::get('/messages', function () {
        return \App\Models\Message::latest()->get();
    })->name('admin.messages.index');

    // Balas pesan
    Route::post('/messages/{id}/reply', [AdminController::class, 'reply'])->name('admin.messages.reply');
});

require __DIR__.'/auth.php';
