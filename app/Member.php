<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        // TODO
    ];

    protected $visible = [
        'id', 'nickname', 'sex'
    ];

//    public function tickets() {
//        return $this->hasMany('App\Ticket');
//    }

    public function payments() {
        return $this->hasMany('App\Member');
    }
}
