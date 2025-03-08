<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Livewire\ManageTags;


// Redirige vers la page de connexion si l'utilisateur n'est pas connecté
Route::get('/', function () {
    return redirect('login');
});

// Routes d'authentification (login, register) via le fichier auth.php
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/tags', function () {
        return view('tags.index');
    })->name('tags.index');
});



// Groupe de routes protégées (uniquement accessibles si connecté)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); // Affiche la page home UNIQUEMENT si connecté

});

Route::post('/logout', function (Request $request) {
    Auth::logout(); // Déconnecte l'utilisateur
    $request->session()->invalidate(); // Invalide la session
    $request->session()->regenerateToken(); // Regénère le token CSRF
    return redirect('/login'); // Redirige vers la page de connexion
})->name('logout');
