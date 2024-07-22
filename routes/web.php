<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pacientes;
use App\Livewire\Usuarios;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/pacientes', Pacientes::class);
    Route::get('/usuarios', Usuarios::class);
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});
