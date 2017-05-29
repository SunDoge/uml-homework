<?php

namespace App\Http\Controllers\Cinema;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
    {
//        if ($movies = Movie::all()) {
//            return view('cinema.movie.index', compact('movies'));
//        }
//        return '404 not found';
        return view('cinema.movie.index');
    }

    public function show($id)
    {
        if ($movie = Movie::find($id)) {

            $sessions = $movie->sessions()->latest('datetime')->get();

            return view('cinema.movie.show', compact('movie', 'sessions'));
        }

        return '404 not found';
    }

    public function store(Request $request)
    {
        if ($query = $request->input('query')) {
            $movies = Movie::where($query['where'], 'like', '%'. $query['value'] . '%')->get();
        } else {
            $movies = Movie::all();
        }

        return response()->json($movies);
    }
}
