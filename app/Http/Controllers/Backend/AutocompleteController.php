<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
        return view('backend.layout');
    }

    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            if (strlen($query) >= 3 && \Auth::guest()) {
                $data = DB::table('movies')
                    ->where('movie_title', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul class="dropdown-menu scrollable-menu" role="menu" style="display:block; position:absolute">';
                foreach ($data as $row) {
                    $output .= '
                           <li><a href="'.route("movies.Detail", $row->movie_slug).'">' . $row->movie_title . '</a></li>
                           ';
                }
                $output .= '</ul>';
                echo $output;
            } elseif ((strlen($query) >= 3 && !\Auth::guest())) {
                $data = DB::table('movies')
                    ->where('movie_title', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul class="dropdown-menu scrollable-menu" role="menu" style="display:block; position:absolute">';
                foreach ($data as $row) {
                    $output .= '
                           <li><a href="'.route('movie.edit',$row->id).'">' . $row->movie_title . '</a></li>
                           ';
                }
                $output .= '</ul>';
                echo $output;
            }
        }
    }

}
