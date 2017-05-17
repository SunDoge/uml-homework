<?php

namespace App\Http\Controllers\Member;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index() {
        if ($movies = Movie::all()) {
            return view('member.movie.index', compact('movies'));
        }
        return '404 not found';
    }

    public function show($id) {
        //
    }
}
