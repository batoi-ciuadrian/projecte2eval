<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {
    
    public $timestamps = false;
    protected $guarded = [];

    public function movies() {
        return $this->hasMany('App\Movie', 'id_genre', 'id');
    }

}
