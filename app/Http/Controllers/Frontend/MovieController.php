<?php

namespace App\Http\Controllers\Frontend;

use App\Movies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {

        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json();

        dump($popularMovies);

        $data['movies'] = DB::table('movies')->paginate(6);

        return view('frontend.movies.index', compact('data', 'popularMovies'));
    }

    public function detail($slug)
    {
        $movieList = DB::table('movies')->paginate(6);
        $movie=Movies::where('movie_slug', $slug)->first();
        return view('frontend.movies.detail', compact('movie', 'movieList'));
    }
}
