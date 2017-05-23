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
        if ($movie = Movie::find($id)) {
            $sessions = $movie->sessions()->get();


            return view('member.movie.show', compact('movie', 'sessions'));
        }

        return '404 not found';
    }

    public function search($name) {

    }
}
