<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Movie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $movie = new Movie();
        $movie->fill($request->toArray());
        $movie->save();
        return "Se ha creado la película correctamente";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Movie::where('id', $id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $pelicula = Movie::find($id);
        $pelicula->fill($request->toArray());
        $pelicula->save();
        return "Se ha modificado la pelicula";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $pelicula = Movie::find($id);
        $pelicula->delete();
        return "Se ha eliminado la pelicula";
    }
    
    public function rent($id) {
        DB::transaction(function ()use ($id) {
          $pelicula = Movie::findOrFail($id);
          if($pelicula->rented) {
              return "La pelicula ya está alquilada";
          }
          $pelicula->rented = 1;
          $pelicula->save();
          $pelicula->usuarios()->attach(Auth::id(), ['dateRent' => fecha()]);
          return "Se ha alquilado la pelicula";
        });
        
    }
    
    public function returnMovie($id) {
        DB::transaction(function ()use ($id) {
          $pelicula = Movie::findOrFail($id);
          if (Auth::user()->rent_movies->contains($pelicula)) {
              return "No tienes alquilada esta pelicula";
          }
          $pelicula->rented = 0;
          $pelicula->save();
          $pelicula->usuarios()->attach(Auth::id(), ['dateReturn' => fecha()]);
          return "Se ha devuelto la pelicula";
        });
        
    }

}
