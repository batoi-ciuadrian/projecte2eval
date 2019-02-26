<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
/**
 * Description of AccountController
 *
 * @author 
 */
class AccountController {
    public function getRentedMovies() {
        $arrayPeliculas = Auth::user()->rent_movies;
        $pagina = false;
        return view('catalog.index', compact('arrayPeliculas', 'pagina'));
    }
    public function getRentHistory() {
        $arrayPeliculas = Auth::user()->peliculas;
        $pagina = false;
        return view('catalog.index', compact('arrayPeliculas', 'pagina'));
    }
}
