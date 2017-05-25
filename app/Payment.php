<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'member_id',
        'amount'
    ];

    public function member() {
        return $this->belongsTo('App\Member');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }
}
