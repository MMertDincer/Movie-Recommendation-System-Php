<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){

        return view('backend.default.index');
    }

    public function login(){
        return view('backend.default.login');
    }

    public function authenticate(Request $request){

        //dd($request->all());
        $request->flash();

        $credentials=$request->only('email','password');
        $remember_me = $request->has('remember_me') ? true : false;

        if(Auth::attempt($credentials, $remember_me)){
            return redirect()->intended(route('vpanel.Index'));
        } else{
            return back()->with('error', 'Username or password is wrong');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect(route('vpanel.Login'))->with('success', 'Safe Logout Successfully');
    }
}
