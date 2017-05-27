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

    protected $dates  = [
        'datetime',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'date','time'
    ];

    public function getDateAttribute()
    {
        return $this->datetime->format('F j, Y');
    }

    public function getTimeAttribute()
    {
        return $this->datetime->format('l h:i');
    }

    public function movie() {
        return $this->belongsTo('App\Movie');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }
}

