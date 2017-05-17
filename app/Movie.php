<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        // TODO
    ];

    public function sessions() {
        return $this->hasMany('App\Session');
    }
}
