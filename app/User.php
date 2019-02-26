<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {

    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function peliculas() {
        return $this->belongstoMany(Movie::class, 'rents', 'idUser', 'idMovie')->withPivot(['dateRent', 'dateReturn']);
    }

    public function rent_movies() {
        return $this->belongsToMany(Movie::class, 'rents', 'idUser', 'idMovie')->withPivot(['dateRent', 'dateReturn'])->wherePivot('dateReturn', null);
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }

    public function authorizeRoles($roles) {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
    }

    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    
    public function getRoleAttribute(){
        return $this->roles->first()->name;
    }

}
