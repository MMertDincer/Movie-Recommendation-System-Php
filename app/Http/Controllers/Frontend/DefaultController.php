<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Movies;
use App\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DefaultController extends Controller
{
    public function index()
    {
        $data['blog'] = Blogs::all()->sortBy('blog_must');
        $data['movie'] = DB::table('movies')->paginate(6);
        $data['slider'] = Sliders::all()->sortBy('slider_must');
        return view('frontend.default.index', compact('data'));
    }

    public function contact()
    {
        return view('frontend.default.contact');
    }

    public function sendmail(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'message' => 'required'
        ]);

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ];

        Mail::to('mert.vols.dincer@gmail.com')->send(new SendMail($data));

        return back()->with('success', "Mail sent successfully");
    }
}
