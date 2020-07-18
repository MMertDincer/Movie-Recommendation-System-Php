<?php

namespace App\Http\Controllers\Frontend;

use App\Movies;
use App\Http\Controllers\Controller;
use App\RatedMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function index()
    {

        $data['movies'] = DB::table('movies')->paginate(6);

        return view('frontend.movies.index', compact('data'));
    }

    public function detail($slug)
    {
        $movieList = DB::table('movies')->paginate(6);
        $movie=Movies::where('movie_slug', $slug)->first();
        return view('frontend.movies.detail', compact('movie', 'movieList'));
    }

    public function store(Request $request, $id)
    {

        $checkRate = DB::table('rated_movies')
            ->where('user_id', Auth::id())
            ->where('movie_id', $id)
            ->exists();

        if ($checkRate) {
            $movie = RatedMovie::where('movie_id', $id)->update(
                [
                    "movie_rate" => $request->movie_rate,
                ]
            );
        } else {
            $movie = RatedMovie::insert(
                [
                    "user_id" => Auth::id(),
                    "movie_id" => $id,
                    "movie_rate" => $request->movie_rate,
                ]
            );
        }

        if ($movie) {

        }
        return back()->with('error', 'Process Unsuccessful');
    }
}
