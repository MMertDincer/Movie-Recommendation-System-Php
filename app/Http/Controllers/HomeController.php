<?php

namespace App\Http\Controllers;

use App\Movies;
use App\RatedMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;
use function Sodium\add;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['rated'] = DB::table('rated_movies')
            ->where('user_id',Auth::id())
            ->where('movie_rate', '>=', 6.5)
            ->get();

        $data['movies'] = [];
        $i = 0;
        foreach ($data['rated'] as $rated){
            array_push($data['movies'],DB::table('movies')
                ->where('id',$rated->movie_id)
                ->first ());
            $data['movies'][$i]->movie_rate = $rated->movie_rate;
            $output = exec('cd C:\Users\Vols\Desktop\MovieRS\ && py movie_recommender_completed.py "'.$data['movies'][$i]->movie_title.'"');
            $like_movies = json_decode($output);
            $data['like_movies'] = [];
            foreach($like_movies as $like_movie){
                array_push($data['like_movies'], DB::table('movies')
                    ->select('movie_slug','movie_title')
                    ->where('movie_title',$like_movie)
                    ->first());
            }
            $data['movies'][$i]->like_movies = $data['like_movies'];
            $i++;
        }


        return view('home', compact('data'));
    }

}
