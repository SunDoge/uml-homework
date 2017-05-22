<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'movie_id',
        'datetime',
        'room'
    ];

    public function movie() {
        return $this->belongsTo('App\Movie');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }
}

