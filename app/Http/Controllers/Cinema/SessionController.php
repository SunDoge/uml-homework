<?php

namespace App\Http\Controllers\Cinema;

use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function index($movie_id) {
        if($sessions = Session::where('movie_id', $movie_id)->get()) {
            return response()->json($sessions);
        }
        return response()->json();
    }
}
