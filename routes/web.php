<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'));

Route::resource('peserta', PesertaController::class)
    ->except(['show'])
    ->parameters(['peserta' => 'peserta']);

Route::resource('event', EventController::class)->except(['show']);