<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Ajoute ce constructeur pour protéger la page
    public function __construct()
    {
        $this->middleware('auth'); // Cette méthode est définie dans la classe Controller de Laravel
    }

    public function index()
    {
        return view('home'); // Affiche la page home
    }
}
