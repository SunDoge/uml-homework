<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'member_id',
        'session_id',
        'seats',
    ];

    protected $casts = [
        'seats' => 'array',
    ];

    public function member() {
        return $this->belongsTo('App\Member');
    }

    public function session() {
        return $this->belongsTo('App\Session');
    }
}
