<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))
    ->middleware('auth')
    ->name('home');

// Hanya untuk tamu (belum login)
Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:20,1')
        ->name('login.store');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:10,1')
        ->name('register.store');
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin dan user: hanya melihat daftar
    Route::middleware('role:admin,user')->group(function (): void {
        Route::get('/event', [EventController::class, 'index'])->name('event.index');
        Route::get('/speaker', [SpeakerController::class, 'index'])->name('speaker.index');
        Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
        Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
    });

    // Hanya admin: tambah, ubah, hapus
    Route::middleware('role:admin')->group(function (): void {
        Route::resource('event', EventController::class)->except(['index', 'show']);
        Route::resource('speaker', SpeakerController::class)->except(['index', 'show']);
        Route::resource('ticket', TicketController::class)->except(['index', 'show']);
        Route::resource('peserta', PesertaController::class)
            ->except(['index', 'show'])
            ->parameters(['peserta' => 'peserta']);
    });
});