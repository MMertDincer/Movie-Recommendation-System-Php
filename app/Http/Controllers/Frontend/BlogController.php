<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data['blogs'] = Blogs::all()->sortBy('blog_must');
        return view('frontend.blogs.index', compact('data'));
    }

    public function detail($slug)
    {
        $blogList = Blogs::all()->sortBy('blog_must');
        $blog=Blogs::where('blog_slug', $slug)->first();
        return view('frontend.blogs.detail', compact('blog', 'blogList'));
    }
}
