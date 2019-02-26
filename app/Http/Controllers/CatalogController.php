<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests\StoreMovie;
use Styde\Html\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
use App\User;
use App\Rent;

class CatalogController extends Controller
{
        
    public function getIndex(){
        $arrayPeliculas = Movie::paginate(8);
        $pagina = true;
        return view('catalog.index', compact('arrayPeliculas', 'pagina'));
    }
    public function getShow($id){
        $pelicula = Movie::findOrFail($id);
        Date::setLocale('es');
        $date = $pelicula->rented?new Date($pelicula->usuarios->last()->pivot->dateRent):null;
        return view('catalog.show',compact('pelicula', 'date'));
    }
    public function getCreate(){
        return view('catalog.create');
    }
    public function getEdit($id){
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', compact('pelicula'));
    }
    public function postCreate(StoreMovie $request){
        $pelicula = new Movie();
        $pelicula->fill($request->toArray());
        $pelicula->save();
        return redirect('/catalog');
    }
    public function putEdit(StoreMovie $request,$id){
        $pelicula = Movie::findOrFail($id);
        $pelicula->fill($request->toArray());
        $pelicula->save();
        return redirect("/catalog/show/$id");
    }
    public function putRent($id) {
        DB::transaction(function ()use ($id) {
          $pelicula = Movie::findOrFail($id);
          $pelicula->rented = 1;
          $pelicula->save();
          $pelicula->usuarios()->attach(Auth::id(), ['dateRent' => fecha()]);
          Alert::success('Se a alquilado la película.');
        });
        return redirect("/catalog/show/$id");
    }
    public function putReturn($id) {
        DB::transaction(function ()use ($id) {
            $pelicula = Movie::findOrFail($id);
            $pelicula->rented = 0;
            $pelicula->save();
            $pelicula->usuarios()->updateExistingPivot(Auth::id(), ['dateReturn' => fecha()]);
            Alert::success('Se a devuelto la película');
        });
        return redirect("/catalog/show/$id");
    }
    public function deleteMovie($id) {
        $pelicula = Movie::findOrFail($id);
        $pelicula->delete();
        Alert::success('Se a eliminado la película.');
        return redirect("\catalog");
    }
    public function getGenre($id){
        $id = $id?$id:null;
        $arrayPeliculas = Movie::where('id_genre',$id)->paginate(8);
        $pagina = true;
        return view('catalog.index',compact('arrayPeliculas', 'pagina'));
    }
    public function getRentedMovies() {
        $alquileres = Rent::where('dateReturn', null)->get();
        return view('catalog.rent', compact('alquileres'));
    }
    public function getRentHistory() {
        $alquileres = Rent::all();
        return view('catalog.rent', compact('alquileres'));
    }
}
