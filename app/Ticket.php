<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $fillable = [
//        'member_id',
        'session_id',
        'payment_id',
        'seat',
    ];

    protected $casts = [
        'seat' => 'array',
    ];

//    public function member() {
//        return $this->belongsTo('App\Member');
//    }

    public function session()
    {
        return $this->belongsTo('App\Session');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}
