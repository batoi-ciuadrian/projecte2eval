<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Genre;
use App\Http\Requests\StoreGenre;
use Styde\Html\Facades\Alert;

/**
 * Description of GenreController
 *
 * @author 
 */
class GenreController {
    public function getGenres(){
        $genres = Genre::all();
        return view('genre.genres', compact('genres'));
    }
    
    public function getEdit($id) {
        $genre = Genre::findOrFail($id);
        return view('genre.edit', compact('genre'));
    }
    
    public function putEdit(StoreGenre $request,$id){
        $genre = Genre::findOrFail($id);
        $genre->fill($request->toArray());
        $genre->save();
        return redirect("/genre");
    }
    
    public function deleteGenre($id) {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        Alert::success('S\'ha eliminat el gènere');
        return redirect("/genre");
    }
    
    public function postCreate(StoreGenre $request){
        $genre = new Genre();
        $genre->fill($request->toArray());
        $genre->save();
        return redirect('/genre');
    }
    
    public function getCreate(){
        return view('genre.create');
    }
}
