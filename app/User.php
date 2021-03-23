<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //un utilisateurs appartien à plusieurs roles
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

        //fonction adimin qui retourne vrai si l'utilisateur a un role de admin
        public function isAdmin()
        {
           return $this->roles()->where('name','admin')->first();
        }

        //tanque le role sera admin ou editeur alors il retourne vrai
        public function hasAnyRole(array $roles)
        {
            return  $this->roles()->whereIn('name', $roles)->first();
        }
}
