<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    function index()
    {
        return view('frontend.layout');
    }

    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('movies')
                ->where('movie_title', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu scrollable-menu" role="menu" style="display:block; position:absolute">';
            foreach ($data as $row) {
                $output .= '
                           <li><a href="' . route('movie.edit', $row->id) . '">' . $row->movie_title . '</a></li>
                           ';
            }
            $output .= '</ul>';
            echo $output;


        } else {
            dd($request);
        }
    }
}
