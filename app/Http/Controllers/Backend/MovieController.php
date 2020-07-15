<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movies;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('movies')->paginate(15);
        return view('backend.movies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (strlen($request->movie_slug) > 3) {
            $slug = Str::slug($request->movie_slug);
        } else {
            $slug = Str::slug($request->movie_title);
        }

        if ($request->hasFile('movie_file')) {
            $request->validate([
                'movie_title' => 'required',
                'movie_content' => 'required',
                'movie_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->movie_file->getClientOriginalExtension();
            $request->movie_file->move(public_path('images/movies'), $file_name);
        } else {
            $file_name = null;
        }


        $movie = Movies::insert(
            [
                "movie_title" => $request->movie_title,
                "movie_original_title" => $request->movie_original_title,
                "movie_original_language" => $request->movie_original_language,
                "movie_id" => $request->movie_id,
                "status" => $request->status,
                "movie_keywords" => $request->movie_keywords,
                "movie_genres" => $request->movie_genres,
                "movie_file" => $file_name,
                "movie_slug" => $slug,
                "movie_content" => $request->movie_content,
                "movie_status" => $request->movie_status,
            ]
        );

        if ($movie) {
            return redirect(route('movie.index'))->with('success', 'Process Successful');
        }
        return back()->with('error', 'Process Unsuccessful');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movies::where('id', $id)->first();
        return view('backend.movies.edit')->with('movies', $movies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (strlen($request->movie_slug) > 3) {
            $slug = Str::slug($request->movie_slug);
        } else {
            $slug = Str::slug($request->movie_title);
        }

        if ($request->hasFile('movie_file')) {
            $request->validate([
                'movie_title' => 'required',
                'movie_content' => 'required',
                'movie_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->movie_file->getClientOriginalExtension();
            $request->movie_file->move(public_path('images/movies'), $file_name);

            $movie = Movies::Where('id',$id)->update(
                [
                    "movie_title" => $request->movie_title,
                    "movie_original_title" => $request->movie_original_title,
                    "movie_original_language" => $request->movie_original_language,
                    "movie_id" => $request->movie_id,
                    "status" => $request->status,
                    "movie_keywords" => $request->movie_keywords,
                    "movie_genres" => $request->movie_genres,
                    "movie_file" => $file_name,
                    "movie_slug" => $slug,
                    "movie_content" => $request->movie_content,
                    "movie_status" => $request->movie_status,
                ]
            );

            $path='images/movies/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
        } else {
            $movie = Movies::Where('id',$id)->update(
                [
                    "movie_title" => $request->movie_title,
                    "movie_original_title" => $request->movie_original_title,
                    "movie_original_language" => $request->movie_original_language,
                    "movie_id" => $request->movie_id,
                    "status" => $request->status,
                    "movie_keywords" => $request->movie_keywords,
                    "movie_genres" => $request->movie_genres,
                    "movie_slug" => $slug,
                    "movie_content" => $request->movie_content,
                    "movie_status" => $request->movie_status,
                ]
            );
        }



        if ($movie) {
            return back()->with('success', 'Process Successful');
        }
        return back()->with('error', 'Process Unsuccessful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movies::find(intval($id));
        if ($movie->delete()) {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
        //print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value) {
            $movies = Movies::find(intval($value));
            $movies->movie_must = intval($key);
            $movies->save();
        }

        echo true;
    }
}
