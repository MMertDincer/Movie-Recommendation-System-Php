<?php

namespace App\Http\Controllers\Frontend;

use App\Movies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
