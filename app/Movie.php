<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'director',
        'stars',
        'price',
        'runtime',
        'genres',
        'summary',
        'post',
    ];

    public function sessions() {
        return $this->hasMany('App\Session');
    }
}
