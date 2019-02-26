<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    protected $guarded = [];

    public function Genero() {
        return $this->belongsTo(Genre::class, 'id_genre');
    }
    
    public function getIdGenreOptions() {
        return hazArray(Genre::all(), 'id', 'title');
    }
    
    public function usuarios(){
	return $this->belongstoMany(User::class,'rents','idMovie', 'idUser')->withPivot(['dateRent','dateReturn']);
    }

}
