<?php

use App\Livewire\PeliculaIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/peliculas', PeliculaIndex::class)->name('peliculas.index');

require __DIR__.'/auth.php';
