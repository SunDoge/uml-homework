<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        // TODO
    ];

//    public function tickets() {
//        return $this->hasMany('App\Ticket');
//    }

    public function payments() {
        return $this->hasMany('App\Member');
    }
}
