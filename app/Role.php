<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    ////un role peut avoir plusieurs users
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
