<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PesertaController;
<<<<<<< HEAD
use App\Http\Controllers\TicketController;
=======
>>>>>>> c917bdefcc4fcca0a97affe7112f3074ac314b69
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'));

Route::resource('peserta', PesertaController::class)
    ->except(['show'])
    ->parameters(['peserta' => 'peserta']);

<<<<<<< HEAD
Route::resource('event', EventController::class)->except(['show']);

Route::resource('ticket', TicketController::class)->except(['show']);
=======
Route::resource('event', EventController::class)->except(['show']);
>>>>>>> c917bdefcc4fcca0a97affe7112f3074ac314b69
