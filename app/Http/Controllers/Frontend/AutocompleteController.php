<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    function index()
    {
        return view('autocomplete');
    }

    function fetch(Request $request)
    {

        if (strlen('query') >= 3) {
            if ($request->get('query')) {
                $query = $request->get('query');
                $data = DB::table('movies')
                    ->where('movie_title', 'LIKE', "%{$query}%")
                    ->get();
                $output = '<ul class="dropdown-menu scrollable-menu" role="menu"   style="display:block; position:absolute; right: 400px; left: 1200px">';
                foreach ($data as $row) {
                    $output .= '
                           <li><a href="' . route('movies.Detail', $row->movie_slug) . '">' . $row->movie_title . '</a></li>
                           ';
                }
                $output .= '</ul>';
                echo $output;
            }
        }
    }
}
