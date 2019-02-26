<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Movie;

class Rent extends Model
{
    protected $guarded = [];

    public function usuario() {
        return $this->belongsTo(User::class, 'idUser');
    }
    
    public function pelicula() {
        return $this->belongsTo(Movie::class, 'idMovie');
    }
}
